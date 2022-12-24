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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('work_category');
            $table->string('tel');
            $table->string('email');
            $table->string('postcode');
            $table->string('address');
            $table->string('person_in_charge1');
            $table->string('person_in_charge2')->nullable();
            $table->string('person_in_charge3')->nullable();
            $table->date('request_date');
            $table->text('memo');
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
        Schema::dropIfExists('customers');
    }
};