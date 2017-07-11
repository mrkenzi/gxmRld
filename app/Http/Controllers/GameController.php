<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GameDb;
use App\ModDb;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    //
    protected function _listAllGames()
    {
        $allGames = DB::table('games')
            ->join('game_category', 'games.game_category', '=', 'game_category.id')
            ->where('games.game_active', '>', '0')
            ->orderBy('games.game_name', 'asc')
            ->paginate(20);
        return view("listAllGames", ['allGames' => $allGames]);
    }

    public function _viewGame(Request $rq)
    {
        $paramUrl = trim($rq->rqUrl);
        $itemGame = DB::table('games')
            ->join('game_category', 'games.game_category', '=', 'game_category.id')
            ->where('games.game_url', $paramUrl)
            ->first();
        $this->_updateView('game', $itemGame->game_url);
        $relatedGames = DB::table('games')
            ->join('game_category', 'games.game_category', '=', 'game_category.id')
            ->where('games.game_category', $itemGame->game_category)
            ->orderBy(DB::raw('RAND()'))
            ->limit(4)
            ->get();
        $popularGames = DB::table('games')
            ->join('game_category', function ($join) {
                $join->on('games.game_category', '=', 'game_category.id')
                    ->where('games.upcoming', '0')
                    ->where('games.game_active', '>', '0');
            })
            ->orderBy('games.count_view', 'desc')
            ->select('games.*', 'game_category.*')
            ->limit(6)
            ->get();
        $upcomingGames = DB::table('games')
            ->join('game_category', function ($join) {
                $join->on('games.game_category', '=', 'game_category.id')
                    ->where('games.upcoming', '>', '0')
                    ->where('games.game_active', '>', '0');
            })
            ->orderBy('games.created_at', 'desc')
            ->select('games.*', 'game_category.*')
            ->limit(6)
            ->get();
        return view('itemGame', ['itemGame' => $itemGame,
            'relatedGames' => $relatedGames,
            'popularGames' => $popularGames,
            'upcomingGames' => $upcomingGames
        ]);
    }

    protected function _updateView($type, $urlGame)
    {
        if ($type == 'game') {
            DB::table('games')
                ->where('game_url', $urlGame)
                ->increment('count_view');
        } else {
            DB::table('mods')
                ->where('mods_url', $urlGame)
                ->increment('count_view');
        }

    }

    public function _category(Request $rq)
    {
        $checkExits = DB::table('game_category')
            ->where('category_url', trim($rq->rqUrl))
            ->where('category_active', 1)
            ->count();
        if ($checkExits > 0) {
            $getCategoryid = DB::table('game_category')
                ->where('category_url', trim($rq->rqUrl))
                ->where('category_active', 1)
                ->first();
            $categoryGames = DB::table('games')
                ->join('game_category', 'games.game_category', '=', 'game_category.id')
                ->where('games.game_category', intval($getCategoryid->id))
                ->where('games.game_active', '>', '0')
                ->orderBy('games.created_at', 'desc')
                ->paginate(20);
            return view('listItem', ['listGames' => $categoryGames,
                'categoryInfo' => $getCategoryid
            ]);
        } else {
            $relatedGames = DB::table('games')
                ->join('game_category', 'games.game_category', '=', 'game_category.id')
                ->where('games.game_active', '>', '0')
                ->where('games.upcoming', '>', '0')
                ->orderBy(DB::raw('RAND()'))
                ->paginate(12);
            return view('notFound', ['title' => "URL Not Found", 'findMore' => $relatedGames]);
        }
    }

    public function _homepage()
    {
        //$list_category = DB::table('game_category')->get();
        $newGames = DB::table('games')
            ->join('game_category', function ($join) {
                $join->on('games.game_category', '=', 'game_category.id')
                    ->where('games.upcoming', '0')
                    ->where('games.game_active', '>', '0');
            })
            ->orderBy('games.created_at', 'desc')
            ->select('games.*', 'game_category.*')
            ->paginate(20);
        /*$popularGames = DB::table('games')
            ->join('game_category', function ($join) {
                $join->on('games.game_category', '=', 'game_category.id')
                    ->where('games.upcoming', '0')
                    ->where('games.game_active', '>', '0');
            })
            ->orderBy('games.count_view', 'desc')
            ->select('games.*', 'game_category.*')
            ->limit(20)
            ->get();
        $upcomingGames = DB::table('games')
            ->join('game_category', function ($join) {
                $join->on('games.game_category', '=', 'game_category.id')
                    ->where('games.upcoming', '>', '0')
                    ->where('games.game_active', '>', '0');
            })
            ->orderBy('games.created_at', 'desc')
            ->select('games.*', 'game_category.*')
            ->limit(20)
            ->get();*/
        /*$newMods = DB::table('mods')
            ->join('games', function ($join) {
                $join->on('mods.mods_game', '=', 'games.id')
                    ->where('mods.mods_active', '>', '0');
            })
            ->orderBy('mods.created_at', 'desc')
            ->select('mods.*', 'games.game_name', 'games.game_url')
            ->limit(20)
            ->get();*/
        return view('home', ['newGames' => $newGames]);
    }

    public function _viewMod(Request $rq)
    {
        $paramUrl = trim($rq->rqUrl);
        $itemMod = DB::table('mods')
            ->join('games', 'games.id', '=', 'mods.mods_game')
            ->where('mods.mods_url', $paramUrl)
            ->select('mods.*', 'games.game_name', 'games.game_url')
            ->first();
        $this->_updateView('mod', $itemMod->game_url);
        $relatedMods = DB::table('mods')
            ->join('games', 'games.id', '=', 'mods.mods_game')
            ->where('mods.mods_game', $itemMod->mods_game)
            ->select('mods.*', 'games.game_name', 'games.game_url')
            ->orderBy(DB::raw('RAND()'))
            ->limit(6)
            ->get();
        $popularMods = DB::table('mods')
            ->join('games', function ($join) {
                $join->on('mods.mods_game', '=', 'games.id')
                    ->where('mods.mods_active', 1);
            })
            ->orderBy('mods.count_view', 'desc')
            ->select('mods.*', 'games.game_name', 'games.game_url')
            ->limit(6)
            ->get();
        return view('itemMod', ['itemGame' => $itemMod,
            'relatedGames' => $relatedMods,
            'popularGames' => $popularMods
        ]);
    }

    protected function _download(Request $rq)
    {
        $paramUrl = trim($rq->rqUrl);
        $downloadContent = DB::table('download')->where('link_rent', $paramUrl)->first();
        $suggestGame = DB::table('games')
            ->join('game_category', 'games.game_category', '=', 'game_category.id')
            ->where('games.game_active', '>', '0')
            ->orderBy(DB::raw('RAND()'))
            ->limit(6)
            ->get();
        return view('download', ['downloadContent' => $downloadContent, 'suggestGame' => $suggestGame]);
    }
    protected function _upComing()
    {
        //$list_category = DB::table('game_category')->get();
        $upComing = DB::table('games')
            ->join('game_category', function ($join) {
                $join->on('games.game_category', '=', 'game_category.id')
                    ->where('games.upcoming', '1')
                    ->where('games.game_active', '>', '0');
            })
            ->orderBy('games.created_at', 'desc')
            ->select('games.*', 'game_category.*')
            ->paginate(20);

        return view('listUpcoming', ['listGames' => $upComing]);
    }
}
