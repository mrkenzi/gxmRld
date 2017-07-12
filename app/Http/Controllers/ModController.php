<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ModDb;

class ModController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listMods = DB::table('mods')->where('mods_active', '>','0')->orderBy('id', 'desc')->paginate(10);
        return view('admin.mods.index', ['listMods' => $listMods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function _create($idGame)
    {
        $gameId = DB::table('games')->where('id',trim($idGame))->first();
        return view('admin.mods.create', ['idGame'=>$gameId]);
    }
    public function _createTool()
    {
        return view('admin.mods.create');
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
        $modInsert = new ModDb;
        $this->validate($request, [
            'mods_name'=>'required|max:70',
            'mods_active' =>'required',
            'mods_thumbnail' =>'required',
            'mods_des' =>'required',
            'mods_content' =>'required',
            'mods_seo' =>'required',
        ]);
        $modInsert->mods_name = trim($request->input('mods_name'));
        $modInsert->mods_active = trim($request->input('mods_active'));
        $modInsert->mods_thumbnail = trim($request->input('mods_thumbnail'));
        $modInsert->mods_des = trim($request->input('mods_des'));
        $modInsert->mods_content = trim($request->input('mods_content'));
        $modInsert->mods_seo = trim($request->input('mods_seo'));
        if($request->input('mods_game') != ''){
            $modInsert->mods_game = trim($request->input('mods_game'));
        }
        $modInsert->save();

        return redirect()->route('mod-cms.index');
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
        $modInfo = DB::table('mods')->where('id',$id)->first();
        return view('admin.mods.edit', ['modInfo' => $modInfo]);
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
            'mods_name'=>'required|max:70',
            'mods_active' =>'required',
            'mods_thumbnail' =>'required',
            'mods_des' =>'required',
            'mods_content' =>'required',
            'mods_seo' =>'required'
        ]);
        $input = [
            'mods_name' => trim($request->input('mods_name')),
            'mods_active' => trim($request->input('mods_active')),
            'mods_thumbnail' => trim($request->input('mods_thumbnail')),
            'mods_des' => trim($request->input('mods_des')),
            'mods_content' => trim($request->input('mods_content')),
            'mods_seo' => trim($request->input('mods_seo'))
        ];
        $savePost = DB::table('mods')->where('id',$id)->update($input);

        return redirect()->route('mod-cms.edit',$id);
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
        $post = ModDb::findOrFail($id);
        $post->delete();

        return redirect()->route('mod-cms.index')
            ->with('flash_message',
                'Article successfully deleted');
    }
}
