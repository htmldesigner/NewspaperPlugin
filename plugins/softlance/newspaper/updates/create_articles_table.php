<?php namespace Softlance\Newspaper\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateArticlesTable extends Migration
{
    public function up()
    {
        Schema::create('softlance_newspaper_articles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('newspaper_id')->index();
            $table->float('symbol_price')->default(0); // Цена за вимвол
            $table->integer('symbol_limit')->default(0); // Лимит симвлов в статье
//            $table->text('article_price_list')->nullable(); // Список фиксированых цен по кол-ву символов
//            $table->text('photo_size')->nullable(); // Размеры картинок и вычет символов
//            $table->integer('photo_price')->default(0); // Цена выездной фотоссесии
//            $table->integer('studio_photo_price')->default(0); // Цена фото в фотостудии
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('softlance_newspaper_articles');
    }
}
