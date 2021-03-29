<?php namespace Softlance\Newspaper\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateReleasesTable extends Migration
{
    public function up()
    {
        Schema::create('softlance_newspaper_releases', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('newspaper_id')->index();
            $table->string('name')->nullable();
            $table->date('release_date')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('softlance_newspaper_releases');
    }
}
