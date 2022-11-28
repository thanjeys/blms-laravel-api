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
        Schema::create('coordinator_relations', function (Blueprint $table) {
            $table->foreignId('co_user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('rel_user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->string('rel_type')->comment('telecaller / backend');
            $table->primary(['co_user_id', 'rel_user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coordinator_relations');
    }
};
