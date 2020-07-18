<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('c_name')->nullable();
            $table->string('c_address')->nullable();
            $table->string('c_phone')->nullable();
            $table->text('c_description')->nullable();
            $table->string('mediator')->nullable();
            $table->string('m_phone')->nullable();
            $table->string('firstmeet_date')->nullable();
            $table->string('en_firstmeet_date')->nullable();
            $table->string('nextmeet_date')->nullable();
            $table->string('en_nextmeet_date')->nullable();
            $table->string('p_name')->nullable();
            $table->string('p_number')->nullable();
            $table->string('p_email')->nullable();
            $table->string('p_designation')->nullable();
            $table->integer('priority')->nullable();
            $table->integer('is_approve')->default('0');
            $table->boolean('is_active')->default('1');
            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users');
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
        Schema::dropIfExists('clients');
    }
}
