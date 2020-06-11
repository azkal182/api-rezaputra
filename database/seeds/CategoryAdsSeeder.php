<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CategoryAdsSeeder extends Seeder {

    public function run()
    {
        DB::table('hutang_ads')->delete();
        $category = app()->make('App\MemberAds');
        $category->fill(['name' => 'azkal']);
        $category->fill(['adress' => 'cerih']);
        $category->save();
    }

}