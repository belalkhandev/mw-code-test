<?php

namespace Bulkly\Http\Controllers;

use Bulkly\BufferPosting;
use Bulkly\SocialPostGroups;
use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = BufferPosting::latest()->paginate(10);
        $groups = DB::table('social_post_groups')
            ->select('social_post_groups.*')
            ->groupBy('type')
            ->get();

        //dd($posts);

        return view('posts.index', compact(['posts', 'groups']));
    }
}
