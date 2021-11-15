<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeFoodsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_foods', function (Blueprint $table) {
            $table->id()
                  ->index('type_foods_id');
            $table->string('name')
                  ->index('type_foods_name');
            $table->bigInteger('created_by')
                  ->unsigned()->nullable()
                  ->index('type_foods_created_by');
            $table->bigInteger('updated_by')
                  ->unsigned()
                  ->nullable()
                  ->index('type_foods_updated_by');
            $table->bigInteger('deleted_by')
                  ->unsigned()
                  ->nullable()
                  ->index('type_foods_deleted_by');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('created_by')
                  ->references('id')
                  ->on('users')
                  ->cascadeOnDelete();
            $table->foreign('updated_by')
                  ->references('id')
                  ->on('users')
                  ->cascadeOnDelete();
            $table->foreign('deleted_by')
                  ->references('id')
                  ->on('users')
                  ->cascadeOnDelete();

            $table->index('created_at', 'type_foods_created_at');
            $table->index('updated_at', 'type_foods_updated_at');
            $table->index('deleted_at', 'type_foods_deleted_at');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_food');
    }
}
