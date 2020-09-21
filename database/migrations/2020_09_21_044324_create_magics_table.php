<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMagicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('magics', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('address_street1');
            $table->string('address_street2')->nullable();
            $table->string('address_city');
            $table->string('address_state');
            $table->string('address_zip');
            $table->string('phone');
            $table->string('payment_credit_card_number');
            $table->string('payment_credit_card_expiration');
            $table->integer('quantity')->nullable(false);
            $table->string('total');
            $table->string('order_date');
            $table->boolean('fulfilled');
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
        Schema::dropIfExists('magics');
    }
}
