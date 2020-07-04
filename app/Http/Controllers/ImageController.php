<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Validator;
use Session;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('image');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      try {
        $validator = Validator::make($request->all(), [
          'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->passes()) {
          $input = $request->all();
          $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
          $request->image->move(public_path('image'), $input['image']);
          Image::create($input);
          Session::flash('success','Successfully file inserted');
          return redirect('upload-image');
        }else{
          Session::flash('error',$validator->errors()->all()[0]);
          return redirect('upload-image');
        }
      } catch (\Exception $e) {
        Session::flash('error',$e->getMessage());
        return redirect('upload-image');
        return response()->json(['status' => false,'msg'=> $e->getMessage()]);
      }
    }
}
