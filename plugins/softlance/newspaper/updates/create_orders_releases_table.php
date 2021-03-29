<?php namespace Softlance\Newspaper\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateOrderReleasesTable extends Migration
{
    public function up()
    {
        Schema::create('softlance_newspaper_orders_releases', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('release_id')->unsigned();
        });
    }

    public function down()
    {
        Schema::dropIfExists('softlance_newspaper_orders_releases');
    }
}
