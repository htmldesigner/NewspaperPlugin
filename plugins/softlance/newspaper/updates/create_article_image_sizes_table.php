<?php namespace Softlance\Newspaper\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateArticleImageSizesTable extends Migration
{
    public function up()
    {
        Schema::create('softlance_newspaper_article_image_sizes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('newspaper_id')->index();
            $table->string('size')->nullable();
            $table->integer('price')->nullable();
            $table->integer('weight_in_symbol')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('softlance_newspaper_article_image_sizes');
    }
}
