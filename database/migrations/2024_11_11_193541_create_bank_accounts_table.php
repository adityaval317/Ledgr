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
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id('bank_account_id');
            $table->bigInteger('bank_id')->unsigned();
            $table->foreign('bank_id')
                ->references('bank_id')->on('banks')
                ->onDelete('restrict');
            $table->string('bank_account_name');
            $table->json('account_details');
            $table->float('account_limit');
            $table->float('amount_due');
            $table->timestamp('payment_due_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_accounts');
    }
};
