<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Model item ads
 */
class HutangAds extends Model
{

  /**
   * Table database
   */
  protected $table = 'hutang_ads';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'user_id','member_id','uraian','adress','masuk','keluar',
  ];

  /**
   * One to one relationships
   */
  public function category()
  {
    return $this->hasMany('App\MemberyAds');
  }
}