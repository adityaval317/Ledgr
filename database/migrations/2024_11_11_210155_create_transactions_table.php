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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('transaction_id');
            $table->bigInteger('account_holder_id')->unsigned();
            $table->foreign('account_holder_id')
                ->references('account_holder_id')->on('account_holders');
            $table->timestamp('date');
            $table->string('description');
            $table->float('credit');
            $table->float('withdraw');
            $table->bigInteger('account_type_id')->unsigned();
            $table->foreign('account_type_id')
                ->references('account_type_id')->on('account_types');
            $table->bigInteger('bank_id')->unsigned();
            $table->foreign('bank_id')
                ->references('bank_id')->on('banks');
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')
                ->references('category_id')->on('categories');
            $table->bigInteger('sub_category_id')->unsigned();
            $table->foreign('sub_category_id')
                ->references('sub_category_id')->on('sub_categories');
            $table->boolean('recurring_transaction');
            $table->string('recurring_date');
            $table->string('created_by');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
