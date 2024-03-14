<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_user', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('passport')->nullable();
            $table->string('nickname')->nullable();
            $table->integer('age')->nullable();
            $table->string('birthday')->nullable();
            $table->integer('status')->nullable();
            $table->integer('role')->nullable();
            $table->string('image')->nullable();
            $table->integer('loyal_customers_id')->nullable();
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
        Schema::dropIfExists('detail_user');
    }
}
