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
        Schema::table('cart_items', function (Blueprint $table) {
            // Drop the old unique constraint
            $table->dropUnique(['cart_id', 'product_id']);
            
            // Add the new unique constraint that includes color and size
            $table->unique(['cart_id', 'product_id', 'color', 'size']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cart_items', function (Blueprint $table) {
            // Drop the new unique constraint
            $table->dropUnique(['cart_id', 'product_id', 'color', 'size']);
            
            // Restore the old unique constraint
            $table->unique(['cart_id', 'product_id']);
        });
    }
};
