<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->id('bank_id');
            $table->bigInteger('account_holder_id')->unsigned();
            $table->foreign('account_holder_id')
                ->references('account_holder_id')->on('account_holders')
                ->onDelete('restrict');
            $table->string('name');
            $table->string('url');
            $table->string('email_address');
            $table->string('username');
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banks');
    }
};
