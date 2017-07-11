<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RequestGameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $suggestGame = DB::table('games')
            ->join('game_category', 'games.game_category', '=', 'game_category.id')
            ->where('games.game_active', '>', '0')
            ->orderBy(DB::raw('RAND()'))
            ->limit(6)
            ->get();
        return view('request', ['suggestGame' => $suggestGame]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'game_request' => 'required|max:100',
            'email_request' => 'required|email',
        ]);
        $input = [
            'game_request' => trim($request->input('game_request')),
            'email_request' => trim($request->input('email_request')),
            'content_request' => trim($request->input('content_request')),
            'status_request' => 0
        ];
            Session::flash('success', 'Thank you for requesting a game you love');
        DB::table('ken_request')->insert($input);
        return redirect()->route('request-game');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
