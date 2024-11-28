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
        Schema::table('carts', function (Blueprint $table) {
            // Drop the existing foreign key constraint
            $table->dropForeign(['user_id']);

            // Recreate the foreign key with "ON DELETE CASCADE"
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
        Schema::table('carts', function (Blueprint $table) {
            // Drop the existing foreign key constraint
            $table->dropForeign(['produit_id']);

            // Recreate the foreign key with "ON DELETE CASCADE"
            $table->foreign('produit_id')
                ->references('id')
                ->on('produits')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
