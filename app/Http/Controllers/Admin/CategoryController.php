<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows['categories'] = Category::latest('id')->paginate(20);
        return view('admin.show.category',compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rows['categories'] = Category::latest('title')->where('parent_id',NULL)->select('title','id')->get();
        return view('admin.create.category',compact('rows'));
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
            'sorting'=>'required'
        ]);
        $inputs = request()->except('_token');
        isset($inputs['status']) && $inputs['status'] == 'on' ? $inputs['status'] = 1 : $inputs['status'] = 0;
        isset($inputs['is_main']) && $inputs['is_main'] == 'on' ? $inputs['is_main'] = 1 : $inputs['is_main'] = 0;
        if (isset($inputs['parent_id'])){
            $parent = Category::find($inputs['parent_id']);
            $inputs['link'] = $parent->link.'/'.Helper::getTranslatedSlugRu($inputs['title']);
        }else{
            $inputs['link'] = '/'.Helper::getTranslatedSlugRu($inputs['title']);
        }
        if (isset($inputs['image_1'])){
            $fileName = Helper::uploadFile($inputs['image_1']);
            $inputs['image_1'] =$fileName;
        }
        if (isset($inputs['image_2'])){
            $fileName = Helper::uploadFile($inputs['image_2']);
            $inputs['image_2'] =$fileName;
        }
        Category::create($inputs);
        return redirect()->route('category.index');
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
        $rows['category'] = Category::find($id);
        $rows['categories'] = Category::where('id','!=',$id)->where('parent_id',NULL)->latest('title')->select('id','title')->get();
        return view('admin.edit.category',compact('rows'));
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
        $category = Category::findOrFail($id);
        if (isset($inputs['image_1'])){
            if (count($category->image_1)){
                File::delete(public_path('uploads/').$category->image_1);
            }
            $fileName_1 = Helper::uploadFile($inputs['image_1']);
            $inputs['image_1'] =$fileName_1;
        }
        if (isset($inputs['image_2'])){
            if (count($category->image_2)){
                File::delete(public_path('uploads/').$category->image_2);
            }
            $fileName_2 = Helper::uploadFile($inputs['image_2']);
            $inputs['image_2'] =$fileName_2;
        }
        if (isset($inputs['parent_id'])){
            $parent = Category::find($inputs['parent_id']);
            $inputs['link'] = '/'.$parent->link.'/'.Helper::getTranslatedSlugRu($inputs['title']);
        }else{
            $inputs['link'] = '/'.Helper::getTranslatedSlugRu($inputs['title']);
        }
        isset($inputs['status']) && $inputs['status'] == 'on' ? $inputs['status'] = 1 : $inputs['status'] = 0;
        isset($inputs['is_main']) && $inputs['is_main'] == 'on' ? $inputs['is_main'] = 1 : $inputs['is_main'] = 0;
        Category::where('id',$id)->update($inputs);
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $category = Category::where('id',$request->id);
        File::delete(public_path('uploads/').$category->first()->image_1);
        File::delete(public_path('uploads/').$category->first()->image_2);
        $category->delete() ? $result['success'] = TRUE : $result['success'] = FALSE;
        return response()->json($result);
    }

    public function categoryFileDelete(Request $request)
    {
        $category = Category::where('id',$request->category);
        $image = $request->type == 1 ? 'image_1' :'image_2';
        $file = File::delete(public_path('uploads/').$category->first()->$image) ;
        $category->update([$image=>NULL]);
        $file ? $result['success'] = TRUE : $result['success'] = FALSE;

        return response()->json($result);
    }
}
