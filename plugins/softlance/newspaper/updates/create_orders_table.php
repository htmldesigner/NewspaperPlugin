<?php namespace Softlance\Newspaper\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('softlance_newspaper_orders', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('newspaper_id');
            $table->string('user', 255);
            $table->string('email', 255);
            $table->integer('iin');
            $table->string('phone', 30);
            $table->integer('article_id')->nullable();
            $table->longText('article')->nullable();
            $table->longText('article_image')->nullable();
            $table->integer('article_image_size_id')->nullable();
            $table->integer('banner_id')->nullable();
            $table->longText('banner_image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('softlance_newspaper_orders');
    }
}
