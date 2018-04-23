<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Models\Carousel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows['carousels'] = Carousel::latest('id')->paginate(20);
        return view('admin.show.carousel',compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create.carousel');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'image'=>'required',
            'sorting'=>'required'
        ]);
        $inputs = request()->except('_token');
        isset($inputs['status']) && $inputs['status'] == 'on' ? $inputs['status'] = 1 : $inputs['status'] = 0;
        if ($inputs['image']){
            $fileName = Helper::uploadFile($inputs['image']);
            $inputs['image'] =$fileName;
        }
        Carousel::create($inputs);
        return redirect()->route('carousel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rows['carousel'] = Carousel::find($id);
        return view('admin.edit.carousel',compact('rows'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'sorting'=>'required'
        ]);
        $inputs = request()->except('_token','_method');
        $carousel = Carousel::findOrFail($id);
        isset($inputs['status']) && $inputs['status'] == 'on' ? $inputs['status'] = 1 : $inputs['status'] = 0;
         if (isset($inputs['image'])){
            File::delete(public_path('uploads/').$carousel->image);
            $fileName = Helper::uploadFile($inputs['image']);
            $inputs['image'] =$fileName;
        }
        Carousel::where('id',$id)->update($inputs);
        return redirect()->route('carousel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $carousel = Carousel::where('id',$request->id);
        File::delete(public_path('uploads/').$carousel->first()->image);
        $carousel->delete() ? $result['success'] = TRUE : $result['success'] = FALSE;
        return response()->json($result);
    }
}
