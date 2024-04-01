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
        Schema::table('products', function (Blueprint $table) {
            $table->integer('status')->nullable()->default(1);
            $table->decimal('price')->nullable()->default(0);
            $table->integer('quantity')->nullable()->default(0);
            $table->boolean('charge_tax')->nullable()->default(false);
            $table->integer('unit_sold')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function ($table) {
            $table->dropColumn('status');
            $table->dropColumn('price');
            $table->dropColumn('quantity');
            $table->dropColumn('charge_tax');
            $table->dropColumn('unit_sold');
        });
    }
};
