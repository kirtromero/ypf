<?php

namespace App\Http\Controllers;

use App\Scene;
use App\Tag;
use App\Affiliate;
use App\Site;
use App\Stat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        $data['tags'] = Tag::where("active","=",1)->where("name","not like","%gay%")->orderBy('sort','asc')->get();

        return view('home.index', $data);
    }

    public function showSearch($slug = "", Request $request)
    {
        $tag = Tag::where("slug","=",$slug)->first();
        $data['tag'] = $tag;
        $data['scenes'] = $tag->scene()->groupBy('id')->orderBy("created_at","DESC")->paginate(100);
        $data['pageTitle'] = ucfirst( $tag->name ) . " Porn Flix | YourPornFlix.com";

        return view('home.search', $data);
    }

    public function showBySort(Request $request)
    {
        if($request->has('sort'))
        {
            if($request->input('sort') == 'date')
            {
                $data['scenes'] = Scene::orderBy('created_at','desc')->paginate(100);
            }
            else
            {
                $data['scenes'] = Scene::orderBy('rating','desc')->paginate(100);
            }

        }
        elseif($request->has('q'))
        {
            $tag = Tag::where("name","like",$request->input('q'))->first();
            $data['tag'] = $tag;
            $data['scenes'] = $tag->scene()->groupBy('id')->orderBy("created_at","DESC")->paginate(100);
        }
        else
        {
            $data['scenes'] = Scene::paginate(100);
        }

        $data['pageTitle'] = ucfirst( $tag->name ) . " Porn Flix | YourPornFlix.com";

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

    public function getCategories()
    {
        $alltags = Tag::orderBy("name", "ASC")->get();

        $previous = null;

        foreach ($alltags as $key => $value) {
            $firstLetter = substr(ucwords($value->name), 0, 1);
            if(is_numeric($firstLetter)){
                $firstLetter = "#";
            }
            if($previous !== $firstLetter) echo "\n<b>".$firstLetter."</b>";
            $previous = $firstLetter;
            echo "<p><a href='/search/".$value->slug."'>". ucwords($value->name)."</a></p>";
        }

    }
}
