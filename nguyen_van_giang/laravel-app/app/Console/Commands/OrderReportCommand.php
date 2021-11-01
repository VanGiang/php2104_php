<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Models\OrderReport;

class OrderReportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Report data order every day';

    protected $orderModel;
    protected $orderReportModel;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Order $order, OrderReport $orderReport)
    {
        parent::__construct();

        $this->orderModel = $order;
        $this->orderReportModel = $orderReport;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Run at 01:00am

        $yesterday = now()->yesterday();

        // Fake data
        $yesterday = \Carbon\Carbon::createFromFormat('Y-m-d', '2021-10-22');

        $yesterdayBegin = $yesterday->format('Y-m-d H:i:s');
        $yesterdayEnd = $yesterday->format('Y-m-d') . ' 23:59:59';

        $orders = $this->orderModel->with('productOrders')
            ->where('created_at', '>=', $yesterdayBegin)
            ->where('created_at', '<=', $yesterdayEnd)
            ->get();

        $orderQuantity = 0;
        $totalPrice = 0;
        $productQuantity = 0;

        foreach ($orders as $order) {
            $day = $order->created_at->format('d-m-Y');

            $orderQuantity++;
            $totalPrice += $order->total_price;
            $productQuantity += $order->productOrders->sum('quantity');
        }

        $data = [
            'day' => $day,
            'order_quantity' => $orderQuantity,
            'total_price' => $totalPrice,
            'product_quantity' => $productQuantity
        ];

        try {
            $this->orderReportModel->where('day', $data['day'])->delete();

            $this->orderReportModel->create($data);

            $this->comment('Create data success.');
        } catch (\Exception $e) {
            \Log::error($e);
        }

        return Command::SUCCESS;
    }
}
