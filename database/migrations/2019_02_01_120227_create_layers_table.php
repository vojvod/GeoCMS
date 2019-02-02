<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('service_id');
            $table->string('layerName');
            $table->string('layerTitle');
            $table->text('layerAbstract');
            $table->boolean('singleTile');
            $table->boolean('isSearchable');
            $table->boolean('attributesReorder');
            $table->boolean('visibility');
            $table->string('nativeSRS');
            $table->boolean('xy');
            $table->string('geometryField');
            $table->decimal('opacity');
            $table->text('attributes');
            $table->text('attributesExceptions');
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
        Schema::dropIfExists('layers');
    }
}
