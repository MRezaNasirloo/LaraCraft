<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionValueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('option_value', function(Blueprint $table)
		{
            //TODO: Are these two columns good candidate for index?
            $table->unsignedInteger('variation_id');
            $table->unsignedInteger('option_id');
            $table->string('value', 32);
            $table->timestamps();
            $table->softDeletes();

            $table->primary(['variation_id', 'option_id']);

            $table->foreign('variation_id')
                ->references('id')
                ->on('variations')
                ->onDelete('cascade');

            $table->foreign('option_id')
                ->references('id')
                ->on('options')
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
		Schema::drop('option_value');
	}

}
