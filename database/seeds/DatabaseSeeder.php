<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {


    protected $tables = [
        'users',
        'shops',
        'products',
        'options',
        'values'

    ];

    /**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

        $this->cleanDatabase();

		 $this->call('UserTableSeeder');
		 $this->call('ShopTableSeeder');
		 $this->call('ProductTableSeeder');
		 $this->call('OptionTableSeeder');
		 $this->call('OptionValueTableSeeder');
	}

    private function cleanDatabase()
    {
        foreach($this->tables as $table){

            DB::table($table)->truncate();
        }
    }

}