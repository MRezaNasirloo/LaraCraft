<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVariationProductOptionValueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('variation_product_option_value', function(Blueprint $table)
		{
            //TODO: Are these two columns good candidate for index?
            $table->unsignedInteger('variation_id')->index();
            $table->unsignedInteger('product_option_value_id')->index();
            $table->timestamps();
            $table->softDeletes();

            $table->primary(['variation_id', 'product_option_value_id']);

            $table->foreign('variation_id')
                ->references('id')
                ->on('variations')
                ->onDelete('cascade');

            $table->foreign('product_option_value_id')
                ->references('id')
                ->on('product_option_value')
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
		Schema::drop('variation_product_option_value');
	}

}
