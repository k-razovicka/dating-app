<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniqueValuesToUserLikes extends Migration
{

    public function up(): void
    {
        Schema::table('user_likes', function (Blueprint $table) {
            $table->unique(['user_id', 'liked_user_id']);
        });
    }
}
