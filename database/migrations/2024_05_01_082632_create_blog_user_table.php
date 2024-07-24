<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // a user belongstomany subscribeblogs
        // a blog belongstomany subscribeusers

        // pivot table (user_blog)
        // non id (id->primary)
        // id (table-id)

        Schema::create('blog_user', function (Blueprint $table) {
            $table->primary([ 'blog_id','user_id']);
            $table->unsignedBigInteger('blog_id');
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('blog_user');
    }
}
