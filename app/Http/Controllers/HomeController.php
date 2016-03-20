<?php

namespace App\Http\Controllers;

use App\Scene;
use App\Tag;
use App\Affiliate;
use App\Site;
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
        $data['tags'] = Tag::all();
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

        return Redirect::away($scene->link);
    }
}
