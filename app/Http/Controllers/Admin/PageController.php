<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows['pages'] = Page::latest('id')->paginate(20);
        return view('admin.show.page',compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create.page');
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
            'desc'=>'required',
            'sorting'=>'required'
        ]);
        $inputs = request()->except('_token');
        isset($inputs['status']) && $inputs['status'] == 'on' ? $inputs['status'] = 1 : $inputs['status'] = 0;
        $inputs['link'] = Helper::getTranslatedSlugRu($inputs['title']);
        Page::create($inputs);
        return redirect()->route('page.index');
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
        $rows['page'] = Page::find($id);
        return view('admin.edit.page',compact('rows'));
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
            'sorting'=>'required',
            'desc'=>'required'
        ]);
        $inputs = request()->except('_token','_method');
        isset($inputs['status']) && $inputs['status'] == 'on' ? $inputs['status'] = 1 : $inputs['status'] = 0;
        $inputs['link'] = Helper::getTranslatedSlugRu($inputs['title']);
        Page::where('id',$id)->update($inputs);
        return redirect()->route('page.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $page = Page::where('id',$request->id);
        $page->delete() ? $result['success'] = TRUE : $result['success'] = FALSE;
        return response()->json($result);
    }
}
