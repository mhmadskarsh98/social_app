<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followers', function (Blueprint $table) {

            $table->foreignId('following_id')->constrained('users', 'id')->cascadeOnDelete(); // لمين انا عامل فولو
            $table->foreignId('follower_id')->constrained('users', 'id')->cascadeOnDelete(); //مين الي عاملين فولو
            $table->primary(['following_id', 'follower_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('followers');
    }
}
