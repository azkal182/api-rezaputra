<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Model item ads
 */
class MemberAds extends Model
{

  /**
   * Table database
   */
  protected $table = 'member_ads';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'adress',
  ];

}