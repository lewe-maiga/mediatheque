<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("address");
            $table->string("category");
            $table->mediumText("summary");
            $table->boolean("isAvailable")->default(true);
            $table->boolean("isLost")->default(false);
            $table->boolean("special")->default(false);
            $table->foreignId("librarian_id")->constrained();
            $table->foreignId("author_id")->constrained();
            $table->foreignId("microfilm_id")->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
