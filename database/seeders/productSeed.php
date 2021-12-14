<?php

namespace Database\Seeders;

use Faker\Core\Number;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class productSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = ['small','medium','large','x-large'];
        for($i=0;$i<50;$i++){
            DB::table('products')->insert([
                'id'=>null,
                'name' => Str::random(10),
                'special' => rand(0,1),
                'desc'=> Str::random(50),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'price'=>rand(1,30),
                'image_url'=>Str::random(10).".jpg",
                'vegan'=>rand(0,1),
                'cheese'=>rand(0,1),
                'category_id'=>rand(11,16),
                'tomato'=>rand(0,1),
                'paprika'=>rand(0,1),
                'chicken'=>rand(0,1),
                'beef'=>rand(0,1),
                'size'=>$sizes[rand(0,3)],
            ]);
        }
    }
}
