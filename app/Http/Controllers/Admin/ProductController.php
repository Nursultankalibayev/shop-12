<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows['products'] =
            Product::latest('id')->paginate(20);
        return view('admin.show.product',compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rows['categories'] = Category::where('parent_id',NULL)
            ->latest('title')
            ->select('id','title')
            ->get();
        return view('admin.create.product',compact('rows'));
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
            'category_id'=>'required',
            'sh_desc'=>'required',
            'desc'=>'required',
            'price'=>'required',
            'image'=>'required',
            'images'=>'required',
        ]);
        $inputs = request()->except('_token','image','images');

        isset($inputs['status']) && $inputs['status'] == 'on' ? $inputs['status'] = 1 : $inputs['status'] = 0;
        isset($inputs['is_main_catalog']) && $inputs['is_main_catalog'] == 'on' ? $inputs['is_main_catalog'] = 1 : $inputs['is_main_catalog'] = 0;
        isset($inputs['is_new']) && $inputs['is_new'] == 'on' ? $inputs['is_new'] = 1 : $inputs['is_new'] = 0;
        isset($inputs['is_sale']) && $inputs['is_sale'] == 'on' ? $inputs['is_sale'] = 1 : $inputs['is_sale'] = 0;
        $inputs['link'] = Helper::getTranslatedSlugRu($inputs['title']);
        $product = Product::create($inputs);
        if (isset($request['image'])){
            $fileName = Helper::uploadFile($request['image']);
            Image::insert(['image'=>$fileName, 'product_id'=>$product->id, 'type'=>1]);
        }
        if (isset($request['images'])){
            $fileNames = Helper::uploadFiles($request['images']);
            $data = [];
            foreach ($fileNames as $fileName) {
                $data[] = ['image'=>$fileName,'product_id'=>$product->id,'type'=>0];
            }
            if (count($data)) Image::insert($data);
        }
        return redirect()->route('product.index');
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
        $rows['product'] = Product::find($id);
        $rows['categories'] = Category::where('parent_id',NULL)
            ->latest('title')
            ->select('id','title')
            ->get();
        return view('admin.edit.product',compact('rows'));
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
            'category_id'=>'required',
            'sh_desc'=>'required',
            'desc'=>'required',
            'price'=>'required',
        ]);
        $inputs = request()->except('_token','image','images','_method');
        $objectProduct = Product::findOrFail($id);
        isset($inputs['status']) && $inputs['status'] == 'on' ? $inputs['status'] = 1 : $inputs['status'] = 0;
        isset($inputs['is_main_catalog']) && $inputs['is_main_catalog'] == 'on' ? $inputs['is_main_catalog'] = 1 : $inputs['is_main_catalog'] = 0;
        isset($inputs['is_new']) && $inputs['is_new'] == 'on' ? $inputs['is_new'] = 1 : $inputs['is_new'] = 0;
        isset($inputs['is_sale']) && $inputs['is_sale'] == 'on' ? $inputs['is_sale'] = 1 : $inputs['is_sale'] = 0;

        Product::where('id',$id)->update($inputs);

        if (isset($request['image'])){
            $objectImage = Image::where('product_id',$objectProduct->id)->where('type',1);
            if (($objectImage->first())){
                File::delete(public_path('uploads/').$objectImage->first()->image) ;
                $objectImage->delete();
            }
            $fileName = Helper::uploadFile($request['image']);
            Image::insert(['image'=>$fileName, 'product_id'=>$objectProduct->id, 'type'=>1]);
        }
        if (isset($request['images'])){
            $fileNames = Helper::uploadFiles($request['images']);
            $data = [];
            foreach ($fileNames as $fileName) {
                $data[] = ['image'=>$fileName,'product_id'=>$objectProduct->id,'type'=>0];
            }
            if (count($data)) Image::insert($data);
        }

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product_query = Product::where('id',$request->id);
        $images_query = Image::where('product_id',$request->id);
        $images = $images_query->pluck('image');
        $data = [];
        foreach ($images as $image) {
            $data[] = public_path('uploads/').$image;
        }
        if (count($data)) File::delete($data);
        $images_query->delete() && $product_query->delete() ? $result['success'] = TRUE : $result['success'] = FALSE;
        return response()->json($result);
    }

    public function productFileDelete(Request $request)
    {
        $image = Image::where('id',$request->id);
        $file = File::delete(public_path('uploads/').$image->first()->image) ;
        $delete = $image->delete();
        $delete && $file ? $result['success'] = TRUE : $result['success'] = FALSE;

        return response()->json($result);
    }
}
