<?php namespace Flynsarmy\Menu\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateMenuitemsTable extends Migration
{

    public function up()
    {
        Schema::create('flynsarmy_menu_menuitems', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('menu_id')->unsigned()->index();
            $table->boolean('enabled')->index();
            $table->string('label')->default('');
            $table->string('title_attrib')->default('');
            $table->string('id_attrib')->default('');
            $table->string('class_attrib')->default('');
            $table->string('url')->default('');

            // Nesting
            $table->integer('parent_id')->unsigned()->index();
            $table->integer('nest_left');
            $table->integer('nest_right');
            $table->integer('nest_depth');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('flynsarmy_menu_menuitems');
    }

}
