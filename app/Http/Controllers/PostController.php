<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\GameDb;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listGames = DB::table('games')->orderBy('id', 'desc')->paginate(10);
        return view('admin.index', ['listGames' => $listGames]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $listCategory = DB::table('game_category')->where('category_active',1)->pluck('category_name', 'id');
        return view('admin.games.create', ['listCategory'=>$listCategory]);
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
        $gameInsert = new GameDb;
        $this->validate($request, [
            'game_name'=>'required|max:70',
            'game_category' =>'required',
            'game_active' =>'required',
            'game_thumbnail' =>'required',
            'game_wallpaper' =>'required',
            'game_des' =>'required|max:255',
            'game_content' =>'required',
            'downloadzone' =>'required',
        ]);
        $gameInsert->game_name = trim($request->input('game_name'));
        $gameInsert->game_category = trim($request->input('game_category'));
        $gameInsert->game_active = trim($request->input('game_active'));
        $gameInsert->game_thumbnail = trim($request->input('game_thumbnail'));
        $gameInsert->game_wallpaper = trim($request->input('game_wallpaper'));
        $gameInsert->game_des = trim($request->input('game_des'));
        $gameInsert->game_content = trim($request->input('game_content'));
        $gameInsert->downloadzone = trim($request->input('downloadzone'));
        $gameInsert->tags = trim($request->input('tags'));
        $gameInsert->passunrar = trim($request->input('passunrar'));

        $gameInsert->save();

        return redirect()->route('post.index');
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
        $gameInfo = DB::table('games')->where('id',$id)->first();
        $listCategory = DB::table('game_category')->where('category_active',1)->pluck('category_name', 'id');
        return view('admin.games.edit', ['gameInfo' => $gameInfo,'listCategory'=>$listCategory]);
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
            'game_name'=>'required|max:70',
            'game_category' =>'required',
            'game_active' =>'required',
            'game_thumbnail' =>'required',
            'game_wallpaper' =>'required',
            'game_des' =>'required|max:255',
            'game_content' =>'required',
            'downloadzone' =>'required',
        ]);
        $input = [
            'game_name' => trim($request->input('game_name')),
            'game_category' => trim($request->input('game_category')),
            'game_active' => trim($request->input('game_active')),
            'game_thumbnail' => trim($request->input('game_thumbnail')),
            'game_wallpaper' => trim($request->input('game_wallpaper')),
            'game_des' => trim($request->input('game_des')),
            'game_content' => trim($request->input('game_content')),
            'downloadzone' => trim($request->input('downloadzone')),
            'tags' => trim($request->input('tags')),
            'passunrar' => trim($request->input('passunrar'))
        ];
        $savePost = DB::table('games')->where('id',$id)->update($input);

        return redirect()->route('post.edit',$id);
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
        GameDb::destroy($id);

        return redirect()->route('post.index');
    }
}
