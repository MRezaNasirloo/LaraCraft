<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVariationOptionValueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('variation_option_value', function(Blueprint $table)
		{
            //TODO: Are these two columns good candidate for index?
            $table->unsignedInteger('variation_id')->nullable()->index();
            $table->unsignedInteger('value_id')->nullable()->index();
            //$table->string('value', 32);
            $table->timestamps();
            $table->softDeletes();

            $table->primary(['variation_id', 'value_id']);

            $table->foreign('variation_id')
                ->references('id')
                ->on('variations')
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
		Schema::drop('variation_option_value');
	}

}
