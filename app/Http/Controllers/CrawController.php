<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\GameDb;
class CrawController extends Controller
{
    protected function _index()
    {
        $listCraw = DB::table('craw')->paginate(15);
        return view('admin.craw.index', ['listCraw' => $listCraw]);
    }
    protected function _getInfoAll(){
        $listCraw = DB::table('craw')->where('craw_status',0)->get();
        foreach ($listCraw as $key => $value){
            $infoGame = $this->_postUrl("http://localhost:8081/api/get-info", json_encode(['urlProduct' => $value->craw_url,'nameProduct'=>$value->craw_title]));
            if($value->description != ''){
                $contentBody = "<h2>Trailer</h2>";
                $contentBody.= $infoGame->trailer;
                $contentBody.= "<h2>About Game</h2>";
                $contentBody.= $infoGame->description;
                $contentBody.= "<h2>Screenshot</h2>";
                $contentBody.= $infoGame->screenShot;
                $contentBody.= "<h2>System Requirement</h2>";
                $contentBody.= $infoGame->systemRequirement;
                $contentBody.= "<h2>Download</h2>";
                $contentBody.= $infoGame->downloadZone;
                $contentBody.= "<h2>How to install crack</h2>";
                $contentBody.= $infoGame->nfo;
                $saveGame = new GameDb;
                $category = 1;
                if(strpos(strtolower($infoGame->category), "action") > -1){
                    $category = 1;
                }
                if(strpos(strtolower($infoGame->category), "adventure") > -1){
                    $category = 2;
                }
                if(strpos(strtolower($infoGame->category), "fps") > -1){
                    $category = 3;
                }
                if(strpos(strtolower($infoGame->category), "racing") > -1){
                    $category = 4;
                }
                if(strpos(strtolower($infoGame->category), "simulation") > -1){
                    $category = 5;
                }
                if(strpos(strtolower($infoGame->category), "strategy") > -1){
                    $category = 6;
                }
                if(strpos(strtolower($infoGame->category), "sport") > -1){
                    $category = 7;
                }
                if(strpos(strtolower($infoGame->category), "rpg") > -1){
                    $category = 8;
                }
                if(strpos(strtolower($infoGame->category), "indie") > -1){
                    $category = 9;
                }
                $saveGame->game_name = $infoGame->title."-".rand(1,100);
                $saveGame->game_category = $category;
                $saveGame->game_content = $contentBody;
                $saveGame->game_des = substr($infoGame->sortDes,0,160);
                $saveGame->game_thumbnail = $infoGame->thumbnail;
                $saveGame->game_active = 0;
                $saveGame->tags = $infoGame->category;;
                $saveGame->game_wallpaper = $infoGame->wallpaper;
                $saveGame->downloadzone = $infoGame->downloadZone;
                $saveGame->passunrar = "Gamexmod.com";

                $saveGame->save();
            }
        }
    }
    protected function _getInfo(Request $request){
        //dd($request);
        $getCrawInfo = DB::table('craw')->where('craw_status',0)->where('id',$request->crawId)->first();
        $checkExits = DB::table('games')->where('game_name','like',$getCrawInfo->craw_title.'%')->count();
        if($checkExits > 0){
            return redirect()->route('post');
        }
        //dd($getCrawInfo);
        $infoGame = $this->_postUrl("http://localhost:8081/api/get-info", json_encode(['urlProduct' => $getCrawInfo->craw_url,'nameProduct'=>$getCrawInfo->craw_title]));
        $contentBody = "<h2>Trailer</h2>";
        $contentBody.= $infoGame->trailer;
        $contentBody.= "<h2>About Game</h2>";
        $contentBody.= $infoGame->description;
        $contentBody.= "<h2>Screenshot</h2>";
        $contentBody.= $infoGame->screenShot;
        $contentBody.= "<h2>System Requirement</h2>";
        $contentBody.= $infoGame->systemRequirement;
        $contentBody.= "<h2>Download</h2>";
        $category = 1;
        $listCategory = array_unique(explode("Games", $infoGame->category));

        if(strpos(strtolower($listCategory[0]), "action") > -1){
            $category = 1;
        }
        if(strpos(strtolower($listCategory[0]), "adventure") > -1){
            $category = 2;
        }
        if(strpos(strtolower($listCategory[0]), "fps") > -1){
            $category = 3;
        }
        if(strpos(strtolower($listCategory[0]), "racing") > -1){
            $category = 4;
        }
        if(strpos(strtolower($listCategory[0]), "simulation") > -1){
            $category = 5;
        }
        if(strpos(strtolower($listCategory[0]), "strategy") > -1){
            $category = 6;
        }
        if(strpos(strtolower($listCategory[0]), "sport") > -1){
            $category = 7;
        }
        if(strpos(strtolower($listCategory[0]), "rpg") > -1){
            $category = 8;
        }
        if(strpos(strtolower($listCategory[0]), "indie") > -1){
            $category = 9;
        }
        $saveGame = new GameDb;
        $saveGame->game_name = $infoGame->title."-".rand(1,100);
        $saveGame->game_category = $category;
        $saveGame->game_des = substr($infoGame->sortDes,0,160);
        $saveGame->game_content = $contentBody;
        $saveGame->game_thumbnail = $infoGame->thumbnail;
        $saveGame->game_active = 0;
        $saveGame->tags = str_replace(" ","",join(",",$listCategory));
        $saveGame->game_wallpaper = $infoGame->wallpaper;
        $downloadZone = str_replace("nofollow external noopener noreferrer","",$infoGame->downloadZone);
        //$downloadZone = str_replace("</a>",$infoGame->title."-DL</a>",$downloadZone);
        $downloadZone = str_replace("<a","<a title='".$infoGame->title." - Pc Download'",$downloadZone);
        $downloadZone.= "<h2>How to install crack</h2>";
        $downloadZone.= $infoGame->nfo;
        $saveGame->downloadzone = $downloadZone;
        $saveGame->passunrar = "Gamexmod.com";
        //dd($saveGame);
        $saveGame->save();
        $idSaved = $saveGame->id;
        //$getCrawInfo = DB::table('craw')->where('craw_status',0)->where('id',$request->crawId)->first();
        $update = DB::table('craw')->where('id',$request->crawId)->update(['craw_status'=>1,'postId'=>$infoGame->postId]);
        return redirect()->route('post.edit',$idSaved);
    }
    protected function _getNew(Request $request)
    {
        $pageStart = $request->pagestart;
        $pageEnd = $request->pageend;
        $listNew = $this->_postUrl("http://localhost:8081/api/new-game", json_encode(['urlcrawl' => urlencode("https://www.skidrow-games.io/"),'pagestart'=>$pageStart,'pageend'=>$pageEnd]));
        $sumNew = 0;
        $sumAdded = 0;
        foreach ($listNew as $key => $value) {
            $findExits = DB::table('craw')->where('craw_title', $value->productname)->count();
            if ($findExits > 0) {
                $listNew[$key]->exits = 1;
                $sumNew++;
            } else {
                $listNew[$key]->exits = 0;
                $sumNew++;
                $saveData = [
                    'craw_title' => $value->productname,
                    'craw_url' => $value->linkproduct
                ];
                DB::table('craw')->insert($saveData);
            }
        }
        return view('admin.craw.new',['listNew' => $listNew,'sumNew'=>$sumNew,'sumAdded'=>$sumAdded]);
    }

    protected function _postUrl($url, $data) {
        $headerArray = array(
            'Content-Type: application/json; charset=UTF-8',
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headerArray);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);

        $result = curl_exec($ch);
        return json_decode($result);
    }

}
