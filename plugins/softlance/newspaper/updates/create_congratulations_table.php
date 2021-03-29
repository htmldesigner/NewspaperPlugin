<?php namespace Softlance\Newspaper\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateCongratulationsTable extends Migration
{
    public function up()
    {
        Schema::create('softlance_newspaper_congratulations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('newspaper_id')->index();
            $table->float('congratulation_symbol_price')->default(0); // Цена за вимвол
            $table->float('congratulation_count')->default(0); // Количество поздравлений в выпуске
            $table->integer('congratulation_symbol_limit')->default(0); // Лимит симвлов
            $table->text('congratulation_price_list')->nullable(); // Список фиксированых цен по кол-ву символов
            $table->text('congratulation_photo_size')->nullable(); // Размеры картинок и вычет символов
            $table->integer('congratulation_photo_price')->default(0); // Цена выездной фотоссесии
            $table->integer('congratulation_studio_photo_price')->default(0); // Цена фото в фотостудии
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('softlance_newspaper_congratulations');
    }
}
