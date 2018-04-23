<?php

namespace App\Http\Controllers\Index;

use App\Helpers\Helper;
use App\Models\Carousel;
use App\Models\Category;
use App\Models\Page;
use App\Models\Product;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function index()
    {
        $rows['carousels'] = Carousel::where('status',1)->orderBy('sorting','asc')->select('title','id','link','image')->get();
        $rows['content_menu'] = Category::where('status',1)->where('parent_id',NULL)->where('is_main',1)->orderBy('sorting','asc')->get();
        $rows['new_products'] = Product::where('status',1)->where('is_new',1)->orderBy('sorting','asc')->take(4)->get();
        $rows['main_catalogs'] = Product::where('status',1)->where('is_main_catalog',1)->orderBy('sorting','asc')->take(6)->get();
        return view('index.index',compact('rows'));
    }

    public function getCategoryProduct(Request $request, $category,$pod_category = NULL)
    {
        $rows['breadcrumbs'] = [];
        $rows['products'] = [];
        $rows['active_menu'] = 'oboi';
        if ($category && !$pod_category)
        {
            $slug = '/'.$category;
            $cat = Helper::getCategoryInSlug($slug);
            $rows['breadcrumbs'][0] = ['title'=>$cat->title,'link'=>$cat->link];
            $catChildren = $cat->children->pluck('id');
            if (isset($catChildren)){
                $rows['products'] = Product::whereIn('category_id',$catChildren)->where('status',1)->paginate(12);
            }
        }
        else
        {
            $slug = '/'.$category.'/'.$pod_category;
            $parent = Helper::getCategoryInSlug('/'.$category);
            $cat = Helper::getCategoryInSlug($slug);
            $rows['breadcrumbs'][0] = ['title'=>$parent->title,'link'=>$parent->link];
            $rows['breadcrumbs'][1] = ['title'=>$cat->title,'link'=>$cat->link];
            $rows['products'] = Product::where('category_id',$cat->id)->where('status',1)->latest('id')->paginate(12);
        }
        return view('index.products',compact('rows'));
    }

    public function getProduct($slug)
    {
        $rows['active_menu'] = 'oboi';
        $rows['product'] = Product::where('link',$slug)->first();

        if (!$rows['product'] ) abort(404);

        $rows['recommends'] = Product::where('category_id',$rows['product']->category_id)
            ->where('id','!=',$rows['product']->id)
            ->orderBy('id','desc')->take(4)->get();

        return view('index.product_detail',compact('rows'));
    }

    public function getSalesProduct()
    {
        $rows['active_menu'] = 'sales';
        $rows['carousels'] = Carousel::where('status',1)->orderBy('sorting','asc')->select('title','id','link','image')->get();
        $rows['sales_products'] = Product::where('is_sale',1)->where('status',1)->paginate(12);
        return view('index.sales',compact('rows'));
    }

    public function getPage($slug)
    {
        $rows['active_menu'] = $slug;
        $rows['page'] = Page::where('link',$slug)->where('status',1)->first();
        return view('index.page',compact('rows'));
    }

    public function getGallery()
    {
        $rows['active_menu'] = 'gallery';
        $rows['galleries'] = Gallery::where('status',1)->paginate(20);
        return view('index.gallery',compact('rows'));
    }

    public function basket(Request $request, Product $product)
    {
        $sessions = Session::get('products');
        $rows['products'] = [];
        if (count($sessions)){
             $ids = [];
            foreach ($sessions as $session) {
                $ids[]= $session['id'];
            }

            $rows['products'] = Product::whereIn('id',$ids)->get();
            foreach ($rows['products'] as $key=> $item) {
                $item->count = $sessions[$key]['count'];
            }
        }
        return view('index.basket',compact('rows'));
    }
    public function search(Request $request)
    {
        $rows['query'] = $request['query'];
        if (!count($rows['query']))
            return redirect()->back();
        $rows['products'] = Product::where('title','LIKE','%'.$rows['query'].'%')->where('status',1)->latest('id')->paginate(12);
        return view('index.search',compact('rows'));
    }
}
