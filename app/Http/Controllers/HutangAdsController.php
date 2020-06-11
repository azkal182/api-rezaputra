<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HutangAds;

class ItemAdsController extends Controller
{

    /**
     * Create a new auth instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get all data from HutangAds
     */
    public function index(Request $request)
    {
      $HutangAds = HutangAds::all();
      if (count($HutangAds) !== 0) {
          $res['success'] = true;
          $res['result'] = $HutangAds;

          return response($res);
      }else{
          $res['success'] = true;
          $res['result'] = 'No ads have been published!';

          return response($res);
      }

    }

    /**
     * Insert database for ItemAds
     * Url : /HutangAds
     */
    public function create(Request $request)
    {
      $HutangAds = new HutangAds;
      $HutangAds->fill([
        'user_id' => $request->input('user_id'),
        'member_id' => $request->input('member_id'),
        'uraian' => $request->input('uraian'),
        'masuk' => $request->input('masuk'),
        'keluar' => $request->input('keluar'),
      ]);
      if($HutangAds->save()){
        $res['success'] = true;
        $res['result'] = 'Success add new HutangAds!';

        return response($res);
      }
    }

    /**
     * Get one data ItemAds by id
     * Url : /HutangAds/{id}
     */
    public function read(Request $request, $id)
    {
      $HutangAds = HutangAds::where('member_id',$id)->get();
      if ($HutangAds !== null) {
        $res['success'] = true;
        $res['result'] = $HutangAds;

        return response($res);
      }else{
        $res['success'] = false;
        $res['result'] = 'Category not found!';

        return response($res);
      }
    }

    /**
     * Update data ItemAds by ud
     * Url : /HutangAds/udpate/{id}
     */
    public function update(Request $request, $id)
    {
      if ($request->has('uraian')) {
          $HutangAds = HutangAds::find($id);
          $HutangAds->uraian = $request->input('uraian');
          if ($HutangAds->save()) {
              $res['success'] = true;
              $res['result'] = 'Success update  '.$request->input('uraian');

              return response($res);
          }
      }else{
        $res['success'] = false;
        $res['result'] = 'Please fill uraian HutangAds!';

        return response($res);
      }
    }

    /**
     * Delete data ItemAds by id
     */
    public function delete(Request $request, $id)
    {
      $HutangAds = HutangAds::find($id);
      if ($HutangAds->delete($id)) {
          $res['success'] = true;
          $res['result'] = 'Success delete HutangAds!';

          return response($res);
      }
    }

}