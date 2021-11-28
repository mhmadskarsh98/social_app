<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftDeletePosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
            $table->enum('status',['published','draft']);
            $table->enum('visibilaty',['me','follwers','public'])->default('public');
            $table->softDeletes()->after('updated_at');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //

            $table->dropSoftDeletes();
            $table->dropColumn('status');
            $table->dropColumn('visibilaty');

        });
    }
}
