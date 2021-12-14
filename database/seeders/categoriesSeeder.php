<?php

namespace Database\Seeders;

use Faker\Core\Number;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class categoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'pizza',
            'burgery',
            'wrapy',
            'napoje',
            'dodatki',
            'taco'
        ];
        for($i=0;$i<6;$i++){
            DB::table('categories')->insert([
                'name' => $categories[$i],
                'category_img'=>$categories[$i].".png",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
        }
    }
}
