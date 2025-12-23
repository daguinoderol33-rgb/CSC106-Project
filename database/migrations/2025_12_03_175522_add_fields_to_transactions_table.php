<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('transactions', function (Blueprint $table) {
        $table->string('address')->after('borrower_name');
        $table->string('contact_number')->after('address');
        $table->string('work')->after('contact_number');
        $table->enum('status', ['pending', 'done'])->default('pending')->change();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            //
        });
    }
};
