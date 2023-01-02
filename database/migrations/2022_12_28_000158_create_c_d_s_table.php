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
        Schema::create('c_d_s', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->mediumText("summary");
            $table->string("category");
            $table->integer("duration");
            $table->boolean("isAvailable");
            $table->boolean("isLost");
            $table->integer("caution");
            $table->foreignId("librarian_id")->constrained();
            $table->foreignId("author_id")->constrained();
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
        Schema::dropIfExists('c_d_s');
    }
};
