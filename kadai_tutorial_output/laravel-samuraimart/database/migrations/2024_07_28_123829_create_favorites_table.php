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
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->comment('user_id');
            $table->string('favoriteable_type');
            $table->unsignedBigInteger('favoriteable_id');
            $table->timestamps();

            $table->index(['favoriteable_type', 'favoriteable_id'], 'favorites_favoriteable_type_favoriteable_id_index');
            $table->index('user_id', 'favorites_user_id_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorites');
    }
};
