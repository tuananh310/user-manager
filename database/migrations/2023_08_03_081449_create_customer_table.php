<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('company_name');
            $table->text('company_type')->nullable();
            $table->text('position');
            $table->text('phone');
            $table->text('email');
            $table->text('country');
            $table->text('product_interested_in')->nullable();
            $table->text('other_concern')->nullable();
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
        Schema::dropIfExists('customer');
    }
};
