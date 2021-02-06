<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonXPersonTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_x_person_type', function (Blueprint $table) {
            $table->unsignedBigInteger('person_id');
            $table->foreign('person_id', 'fk_person_type')->references('id')->on('persons');
            $table->unsignedBigInteger('person_type_id');
            $table->foreign('person_type_id', 'fk_type')->references('id')->on('person_types');
            $table->unique(['person_id', 'person_type_id'], 'uk_person_type');
            $table->string('document', 14)->unique('uk_document');
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
        Schema::dropIfExists('person_x_person_type');
    }
}
