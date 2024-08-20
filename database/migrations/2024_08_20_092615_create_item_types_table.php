<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateItemTypesTable extends Migration
{
    public function up()
    {
        Schema::create('item_types', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED (Default for $table->id())
            $table->string('type_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('item_types');
    }
}
