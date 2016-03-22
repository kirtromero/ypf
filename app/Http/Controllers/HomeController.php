<?php

namespace App\Http\Controllers;

use App\Scene;
use App\Tag;
use App\Affiliate;
use App\Site;
use App\Stat;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function showHome()
    {
        $data['tags'] = Tag::where("active","=",1)->orderBy('sort','desc')->get();
        return view('home.index', $data);
    }

    public function showSearch($slug = "")
    {
        $tag = Tag::where("name","=",$slug)->first();
        $data['tag'] = $tag;
        $data['scenes'] = $tag->scene->all();
        return view('home.search', $data);
    }

    public function showOut($id, $slug = "")
    {
        $scene = Scene::findOrFail($id);

        $stat = new Stat;
        $stat->affiliate_id = $scene->affiliate_id;
        $stat->scene_id = $scene->id;
        $stat->user_agent = $_SERVER['HTTP_USER_AGENT'];
        $stat->save();

        return Redirect::away($scene->link);
    }
}
