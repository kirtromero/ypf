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

    public function showSearch($search = "", Request $request)
    {
        $limit = 100;
        $scenes = Scene::whereHas('tags', function($query) use ($search) {
                            $query->where('slug', 'LIKE', "%".$search."%");
                        })
                        ->orWhere('title', 'LIKE', "%".$search."%")
                        ->whereNull('deleted_at')
                        ->orderBy("rating","DESC");
        $data['total'] = $scenes->count();
        $data['scenes'] = $scenes->paginate($limit);
        $data['pageTitle'] = isset($search) ? ucfirst( $search ) . " Porn Flix | YourPornFlix.com" : " Free Porn Flix | YourPornFlix.com " ;

        return view('home.search', $data);
    }

    public function showBySort(Request $request)
    {
        $limit = 100;
        if($request->has('sort'))
        {
            if($request->input('sort') == 'date')
            {
                $scenes = Scene::orderBy('created_at','desc')->whereNull('deleted_at');
                $data['total'] = $scenes->count();
                $data['scenes'] = $scenes->paginate($limit);
            }
            else
            {
                $scenes = Scene::orderBy('rating','desc')->whereNull('deleted_at');
                $data['total'] = $scenes->count();
                $data['scenes'] = $scenes->paginate($limit);
            }

        }
        elseif($request->has('q'))
        {
            $search = $request->get('q');
            $scenes = Scene::whereHas('tags', function($query) use ($search) {
                                    $query->where('name', 'LIKE', "%".$search."%");
                                })
                                ->orWhere('title', 'LIKE', "%".$search."%")
                                ->whereNull('deleted_at')
                                ->orderBy("rating","DESC");

            $data['total'] = $scenes->count();
            $data['scenes'] = $scenes->paginate($limit);

        }
        else
        {
            $data['scenes'] = Scene::paginate($limit);
        }

        $data['pageTitle'] = isset($search) ? ucfirst( $search ) . " Porn Flix | YourPornFlix.com" : " Free Porn Flix | YourPornFlix.com " ;

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
        $alltags = Tag::where("show","=",1)->orderBy("name", "ASC")->get();

        $previous = null;

        foreach ($alltags as $key => $value) {
            $firstLetter = substr(ucwords($value->name), 0, 1);
            if(is_numeric($firstLetter)){
                $firstLetter = "#";
            }
            if($previous !== $firstLetter) echo "\n<p><b>".$firstLetter."</b></p>";
            $previous = $firstLetter;
            echo "<p><a target='_blank' title='".$value->name."' href='/search/".$value->slug."'>". ucwords(str_limit($value->name, $limit = 45, $end = '...'))."</a></p>";
        }

    }
}
