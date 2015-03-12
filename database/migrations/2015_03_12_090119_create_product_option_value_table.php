<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductOptionValueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_option_value', function(Blueprint $table)
		{
            $table->increments('id');
            $table->unsignedInteger('product_option_id')->index();
            $table->unsignedInteger('value_id')->index();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('product_option_id')
                ->references('id')
                ->on('product_option')
                ->onDelete('cascade');

            $table->foreign('value_id')
                ->references('id')
                ->on('values')
                ->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_option_value');
	}

}
