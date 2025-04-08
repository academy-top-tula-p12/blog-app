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
        Schema::table('posts', function (Blueprint $table) {
            $table->string("title");
            $table->string("cover")->nullable();
            $table->text("content");
            $table->boolean("is_published")->default(true);

            $table->bigInteger("user_id");
            $table->bigInteger("category_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('cover');
            $table->dropColumn('content');
            $table->dropColumn('is_published');
            $table->dropColumn('user_id');
            $table->dropColumn('category_id');
        });
    }
};
