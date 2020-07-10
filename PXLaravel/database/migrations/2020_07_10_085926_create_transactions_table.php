<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("book_id");
            $table->integer("price");
            $table->timestamps();
        });
        Schema::table('transactions', function (Blueprint $table) {
            $table->foreign('book_id')->references('id')->on('books');
        });
        Schema::table('transactions', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign(['book_id']);
        });
        Schema::dropIfExists('transactions');
    }
}
