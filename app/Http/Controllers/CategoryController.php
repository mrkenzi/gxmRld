<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\CategoryDb;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listCategory = DB::table('game_category')->where('category_active', 1)->orderBy('id', 'desc')->paginate(10);
        return view('admin.category.index', ['Categorys' => $listCategory]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $gameInsert = new CategoryDb;
        $this->validate($request, [
            'category_name'=>'required|max:70',
            'category_des' =>'required',
            'category_active' =>'required',
            'category_wallpaper' =>'required'
        ]);
        $gameInsert->category_name = trim($request->input('category_name'));
        $gameInsert->category_des = trim($request->input('category_des'));
        $gameInsert->category_active = trim($request->input('category_active'));
        $gameInsert->category_wallpaper = trim($request->input('category_wallpaper'));

        $gameInsert->save();

        return redirect()->route('admin.category');
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
        //
        $categoryInfo = DB::table('game_category')->where('id',$id)->first();
        return view('admin.category.edit', ['categoryInfo' => $categoryInfo]);
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
        //
        $this->validate($request, [
            'category_name'=>'required|max:70',
            'category_des' =>'required',
            'category_active' =>'required',
            'category_wallpaper' =>'required'
        ]);
        $input = [
            'category_name' => trim($request->input('category_name')),
            'category_des' => trim($request->input('category_des')),
            'category_active' => trim($request->input('category_active')),
            'category_wallpaper' => trim($request->input('category_wallpaper'))
        ];
        $savePost = DB::table('game_category')->where('id',$id)->update($input);

        return redirect()->route('admin.category.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = CategoryDb::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.category')
            ->with('flash_message',
                'Article successfully deleted');
    }
}
