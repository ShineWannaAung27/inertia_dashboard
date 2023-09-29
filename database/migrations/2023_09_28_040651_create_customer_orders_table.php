<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId("item_id")->constrained('items')->onDelete('cascade');;
            $table->foreignId("customer_id")->constrained('customers')->onDelete('cascade');;
            $table->boolean("confirm_status")->default(false);
            $table->integer("confirm_price")->default(0);
            $table->integer("org_price")->default(0);
            $table->text('remark');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_orders');
    }
}
