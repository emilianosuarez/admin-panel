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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('article_id')->nullable();
			$table->string('title')->nullable();
			$table->text('content');
			$table->boolean('active')->default(true);
            $table->dateTime('article_created_at')->nullable(false)->useCurrent();
			$table->foreignId('user_id')->constrained('users');
            $table->timestamps();

            // DB::statement('ALTER TABLE articles ADD FULLTEXT search(title, content)');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
