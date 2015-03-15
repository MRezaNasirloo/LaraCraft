<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValuesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('values', function(Blueprint $table)
		{
			$table->increments('id');
            $table->unsignedInteger('option_id')->index();
            $table->string('value', 32);
            $table->boolean('by_admin')->default(false);
            $table->timestamps();

            $table->softDeletes();

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
		Schema::drop('values');
	}

}
