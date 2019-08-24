<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /*
        // MIGRATIONS
        CREATE TABLE user(
            id bigint(11) AUTO_INCREMETN PRIMARY KEY,
            name VARCHAR(250) NOT NULL,
            ...

        )Engine=Innodb;

        */
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();

            // Geocalização ->
            $table->decimal('lat', 10, 8)->nullable();
            $table->decimal('lng', 11, 8)->nullable();
            $table->string('password');

            $table->tinyInteger('status')->default(1);
            $table->dateTime('deleted_at')->nullable();

            $table->bigInteger('deleted_user_id')->unsigned()->nullable(); // User-deleted
            $table->foreign('user_id')
                ->on('users')->references('id')
                ->onDelete('restrict')
                ->onUpdate('cascade');






            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
