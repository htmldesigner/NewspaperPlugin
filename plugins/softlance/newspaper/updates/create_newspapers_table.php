<?php namespace Softlance\Newspaper\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateNewspapersTable extends Migration
{
    public function up()
    {
        Schema::create('softlance_newspaper_generators', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('softlance_newspaper_generators');
    }
}
