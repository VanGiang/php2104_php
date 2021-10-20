<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->bigInteger('user_id')->nullable()->change();
            $table->string('code')->after('user_id');
            $table->string('name')->change();
            $table->string('email')->after('name');
            $table->string('phone')->after('email');
            $table->text('note')->after('phone');
            $table->text('address')->after('note')->change();
            $table->float('discount')->default(0);
            $table->float('delivery');
            $table->float('total_price')->after('delivery')->change();
            $table->tinyInteger('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->bigInteger('user_id');
            $table->dropColumn([
                'code', 
                'email', 
                'phone', 
                'note', 
                'status',
                'discount',
                'delivery',
            ]);
            $table->string('name')->nullable()->change();
            $table->float('total_price')->nullable()->change();
            $table->text('address')->nullable()->change();
        });
    }
}
