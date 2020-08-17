<?php

namespace Bulkly\Http\Controllers;

use Bulkly\BufferPosting;
use Bulkly\SocialPostGroups;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = BufferPosting::latest()->paginate(10);
        $groups = SocialPostGroups::get();

        //dd($posts);

        return view('posts.index', compact(['posts', 'groups']));
    }
}
