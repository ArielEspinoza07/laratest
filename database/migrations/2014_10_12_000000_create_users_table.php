<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()
                  ->index('users_id');
            $table->string('name')
                  ->index('users_name');
            $table->string('email')
                  ->unique()
                  ->index('users_email');
            $table->timestamp('email_verified_at')
                  ->nullable()
                  ->index('users_email_verified_at');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->index('created_at', 'users_created_at');
            $table->index('updated_at', 'users_updated_at');
            $table->index('deleted_at', 'users_deleted_at');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
