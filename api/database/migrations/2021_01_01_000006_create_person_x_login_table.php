<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonXLoginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_x_login', function (Blueprint $table) {
            $table->unsignedBigInteger('person_id');
            $table->foreign('person_id', 'fk_person_login')->references('id')->on('persons');
            $table->unsignedBigInteger('login_id');
            $table->foreign('login_id', 'fk_login')->references('id')->on('logins');
            $table->unique(['person_id', 'login_id'], 'uk_person_login');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_x_login');
    }
}
