<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ListDataTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('list_data')->delete();
        
        \DB::table('list_data')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'n/a',
                'type' => 'n/a',
                'is_active' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Male',
                'type' => 'Sex',
                'is_active' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Female',
                'type' => 'Sex',
                'is_active' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Jr.',
                'type' => 'Suffix',
                'is_active' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Sr.',
                'type' => 'Suffix',
                'is_active' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'II',
                'type' => 'Suffix',
                'is_active' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'III',
                'type' => 'Suffix',
                'is_active' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'IV',
                'type' => 'Suffix',
                'is_active' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Mobile Carwash',
                'type' => 'Category',
                'is_active' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Interior & Exterior Detailing',
                'type' => 'Category',
                'is_active' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Ceramic Coating',
                'type' => 'Category',
                'is_active' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Add-on Services',
                'type' => 'Category',
                'is_active' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Sedan',
                'type' => 'Car',
                'is_active' => 1,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Pickup',
                'type' => 'Car',
                'is_active' => 1,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'AUV',
                'type' => 'Car',
                'is_active' => 1,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'SUV',
                'type' => 'Car',
                'is_active' => 1,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'S',
                'type' => 'Motorcycle',
                'is_active' => 1,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'M',
                'type' => 'Motorcycle',
                'is_active' => 1,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'L',
                'type' => 'Motorcycle',
                'is_active' => 1,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Car',
                'type' => 'Type',
                'is_active' => 1,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Motorcycle',
                'type' => 'Type',
                'is_active' => 1,
            ),
        ));
        
        
    }
}