<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('label', 255);
            $table->date('date')->useCurrent();
            $table->integer('num')->nullable();
            $table->unsignedFloat('montant')->nullable();
            $table->tinyInteger('status')->default('0');

            $table->integer('added_by')->unsigned();
            $table->integer('etablissement_id')->unsigned();
            $table->integer('entite_benif_id')->unsigned();
            $table->timestamps();

            $table->foreign('etablissement_id')->references('id')->on('etablissements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
