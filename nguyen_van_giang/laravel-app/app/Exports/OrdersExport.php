<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrdersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $title = [
            "id" => "id",
            "name" => "name",
            "user_id" => "user_id",
            "total_price" => "total_price",
            "address" => "address",
            "created_at" => "created_at",
            "updated_at" => "updated_at",
            "phone" => "phone",
            "code" => "code",
            "status" => "status",
            "email" => "email",
        ];

        $orders = Order::all()->toArray();

        array_unshift($orders, $title);

        return collect($orders);
    }
}
