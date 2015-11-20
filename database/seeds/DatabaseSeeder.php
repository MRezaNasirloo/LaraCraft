<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{

    protected $tables = [
        'users',
        'shops',
        'products',
        'options',
        'values',
        'photos'

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

        $this->call(UserTableSeeder::class);
        $this->call(ShopTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(OptionTableSeeder::class);
        $this->call(OptionValueTableSeeder::class);
        $this->call(PhotoTableSeeder::class);
        $this->call(CategoryTableSeeder::class);

        $this->call(ClientsTableSeeder::class);


        Model::reguard();
    }

    private function cleanDatabase()
    {
        foreach($this->tables as $table){

            DB::table($table)->truncate();
        }
    }
}
