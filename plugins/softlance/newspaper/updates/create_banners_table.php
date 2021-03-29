<?php namespace Softlance\Newspaper\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateBannersTable extends Migration
{
    public function up()
    {
        Schema::create('softlance_newspaper_banners', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('newspaper_id')->index();
            $table->text('banner_size');
            $table->integer('banner_price');
            $table->boolean('used_by')->default(0);
            $table->longText('banner_preview');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('softlance_newspaper_banners');
    }
}
