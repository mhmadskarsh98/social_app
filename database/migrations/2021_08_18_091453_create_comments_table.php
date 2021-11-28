<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users','id')->cascadeOnDelete(); // foreign key refrence user at id colume
            $table->foreignId('post_id')->constrained('posts','id')->cascadeOnDelete(); // foreign key refrence post at id colume
            $table->text('content');
            $table->timestamps();

            // ->cascadeOnDelete(); حدف كل الكومنت الخاصة باليوزر
            //    nullOnDelete()  null جعل الكومنت موجود بس قيمة اليوزر اي دي
            //restrictOnDelete() منع حدف اي يوزر قام باضافة كومنت
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
