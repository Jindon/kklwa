<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('relation')->default(1)->comment('1: S/o, 2: W/o, 3: D/o');
            $table->string('relation_name');
            $table->date('dob');
            $table->tinyInteger('gender')->default(1)->comment('1: Male, 2: Female, 3: Others');
            $table->tinyInteger('category')->default(1)->comment('1: General, 2: OBC, 3: SC, 4: ST');
            $table->string('address')->nullable();
            $table->string('edu_qualification')->nullable();
            $table->date('doe');
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
        Schema::dropIfExists('beneficiaries');
    }
}
