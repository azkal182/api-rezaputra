<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ItemAdsSeeder extends Seeder {

    public function run()
    {
        DB::table('hutang_ads')->delete();
        $item = app()->make('App\HutangAds');
        $item->fill([
          'user_id' => 1,
          'member_id' => 1,
          'uraian' => 'Cetak Banner',
          'masuk' => 12000000,
        ]);
        $item->save();
    }

}