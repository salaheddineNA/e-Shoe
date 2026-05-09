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
            $table->decimal('sale_price', 8, 2)->nullable()->after('price');
            $table->boolean('on_sale')->default(false)->after('sale_price');
            $table->date('sale_start_date')->nullable()->after('on_sale');
            $table->date('sale_end_date')->nullable()->after('sale_start_date');
            $table->text('sale_description')->nullable()->after('sale_end_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'sale_price',
                'on_sale',
                'sale_start_date',
                'sale_end_date',
                'sale_description'
            ]);
        });
    }
};
