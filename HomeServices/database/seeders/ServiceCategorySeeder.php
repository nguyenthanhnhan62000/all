<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_categories')->insert(
        [
            [
                'name' => 'AC',
                'slug' => 'ac',
                'image' => '1521969345.png'
            ],
            [
                'name' => 'Beauty',
                'slug' => 'beauty',
                'image' => '1521969358.png'
            ],
            [
                'name' => 'Plumbing',
                'slug' => 'plumbing',
                'image' => '1521969409.png'
            ],
            [
                'name' => 'Electrical',
                'slug' => 'electrical',
                'image' => '1521969419.png'
            ],
            [
                'name' => 'Shower Filter',
                'slug' => 'shower-filter',
                'image' => '1521969430.png'
            ],
            [
                'name' => 'Home cleaning',
                'slug' => 'home-cleaning',
                'image' => '1521969446.png'
            ],
            [
                'name' => 'Carpentry',
                'slug' => 'carpentry',
                'image' => '1521969558.png'
            ],
            [
                'name' => 'Pest Control',
                'slug' => 'pest-control',
                'image' => '1521969576.png'
            ],
            [
                'name' => 'Chimney Hod',
                'slug' => 'chimney-hod',
                'image' => '1521969599.png'
            ],
            [
                'name' => 'Water purifier',
                'slug' => 'chimney-hod',
                'image' => '1521972593.png'
            ],
        ]
    );
    }
}
