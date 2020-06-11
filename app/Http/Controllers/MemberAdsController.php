<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MemberAds;

class MemberAdsController extends Controller
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
     * Get all data from category
     */
    public function index(Request $request)
    {
      $member = new MemberAds;

      $res['success'] = true;
      $res['result'] = $member->all();

      return response($res);
    }

    /**
     * Insert database for MemberAds
     * Url : /category
     */
    public function create(Request $request)
    {
      $member = new MemberAds;
      $member->fill([
        'name' => $request->input('name'),
        'adress' => $request->input('adress'),


        ]);
      if($member->save()){
        $res['success'] = true;
        $res['result'] = 'Success add new member!';

        return response($res);
      }

    }

    /**
     * Get one data MemberAds by id
     * Url : /category/{id}
     */
    public function read(Request $request, $id)
    {
      $member = MemberAds::where('id',$id)->first();
      if ($member !== null) {
        $res['success'] = true;
        $res['result'] = $member;

        return response($res);
      }else{
        $res['success'] = false;
        $res['result'] = 'Member not found!';

        return response($res);
      }
    }

    /**
     * Update data MemberAds by ud
     */
    public function update(Request $request, $id)
    {
      if ($request->has('name')) {
          $member = MemberAds::find($id);
          $member->name = $request->input('name');
          $member->name = $request->input('adress');

          if ($member->save()) {
              $res['success'] = true;
              $res['result'] = 'Success update '.$request->input('name');

              return response($res);
          }
      }else{
        $res['success'] = false;
        $res['result'] = 'Please fill name category!';

        return response($res);
      }
    }

    /**
     * Delete data MemberAds by id
     */
    public function delete(Request $request, $id)
    {
      $member = MemberAds::find($id);
      if ($member->delete($id)) {
          $res['success'] = true;
          $res['result'] = 'Success delete category!';

          return response($res);
      }
    }

}