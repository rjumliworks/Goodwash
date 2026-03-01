<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('services')->delete();
        
        \DB::table('services')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Mobile Car Wash',
                'is_active' => 1,
                'type_id' => 20,
                'category_id' => 9,
                'user_id' => 1,
                'created_at' => '2026-03-01 11:05:54',
                'updated_at' => '2026-03-01 11:05:54',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Mobile Wash and Wax',
                'is_active' => 1,
                'type_id' => 20,
                'category_id' => 9,
                'user_id' => 1,
                'created_at' => '2026-03-01 11:09:05',
                'updated_at' => '2026-03-01 11:09:05',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Basic Interior Detail',
                'is_active' => 1,
                'type_id' => 20,
                'category_id' => 10,
                'user_id' => 1,
                'created_at' => '2026-03-01 11:10:42',
                'updated_at' => '2026-03-01 11:10:42',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Full Interior Detail',
                'is_active' => 1,
                'type_id' => 20,
                'category_id' => 10,
                'user_id' => 1,
                'created_at' => '2026-03-01 11:10:53',
                'updated_at' => '2026-03-01 11:10:53',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Exterior Refresh Detail',
                'is_active' => 1,
                'type_id' => 20,
                'category_id' => 10,
                'user_id' => 1,
                'created_at' => '2026-03-01 11:11:16',
                'updated_at' => '2026-03-01 11:11:16',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Full Exterior Detail',
                'is_active' => 1,
                'type_id' => 20,
                'category_id' => 10,
                'user_id' => 1,
                'created_at' => '2026-03-01 11:11:31',
                'updated_at' => '2026-03-01 11:11:31',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Ceramic Crystal Coating',
                'is_active' => 1,
                'type_id' => 20,
                'category_id' => 11,
                'user_id' => 1,
                'created_at' => '2026-03-01 11:11:55',
                'updated_at' => '2026-03-01 11:11:55',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Graphene Shield Coating',
                'is_active' => 1,
                'type_id' => 20,
                'category_id' => 11,
                'user_id' => 1,
                'created_at' => '2026-03-01 11:12:16',
                'updated_at' => '2026-03-01 11:12:16',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Motorcycle Ceramic Coating',
                'is_active' => 1,
                'type_id' => 21,
                'category_id' => 11,
                'user_id' => 1,
                'created_at' => '2026-03-01 11:12:31',
                'updated_at' => '2026-03-01 11:12:31',
            ),
        ));
        
        
    }
}