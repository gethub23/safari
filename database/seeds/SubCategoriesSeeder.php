<?php

use Illuminate\Database\Seeder;

class SubCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_categories')->insert([
            'name_ar'     => 'مخيمات',
            'name_en'     => 'Camps',
            'category_id' => 1,
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at'  => date("Y-m-d H:i:s"),
        ]);

        DB::table('sub_categories')->insert([
            'name_ar'     => 'طبخ بري ',
            'name_en'     => 'Wild cooking',
            'category_id' => 1,
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at'  => date("Y-m-d H:i:s"),
        ]);

        DB::table('sub_categories')->insert([
            'name_ar'     => 'حطب',
            'name_en'     => 'wood',
            'category_id' => 1,
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at'  => date("Y-m-d H:i:s"),
        ]);

        DB::table('sub_categories')->insert([
            'name_ar'     => 'دبابات',
            'name_en'     => 'Tank',
            'category_id' => 1,
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at'  => date("Y-m-d H:i:s"),
        ]);

        DB::table('sub_categories')->insert([
            'name_ar'     => 'كرفاتات',
            'name_en'     => 'Caravans',
            'category_id' => 1,
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at'  => date("Y-m-d H:i:s"),
        ]);

        DB::table('sub_categories')->insert([
            'name_ar'     => 'رحله صيد',
            'name_en'     => 'fishing trip',
            'category_id' => 2,
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at'  => date("Y-m-d H:i:s"),
        ]);

        DB::table('sub_categories')->insert([
            'name_ar'     => 'رحله ترفيهيه',
            'name_en'     => 'entertainment trip',
            'category_id' => 2,
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at'  => date("Y-m-d H:i:s"),
        ]);

        DB::table('sub_categories')->insert([
            'name_ar'     => 'رحله اسكتشافيه',
            'name_en'     => 'A journey of discovery',
            'category_id' => 2,
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at'  => date("Y-m-d H:i:s"),
        ]);
        
    }
}
