<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        $Tweets = tweet::all();

        return view('home', ['tweets' => $Tweets]);

    }

    public function _construct()
    {
        $this->middleware('auth');

    }

    public function tweet(Request $request)
    {


        Tweet::create([
            'body' => $request->input('body'),
            'user_id' => $request->user()->id
        ]);
        return back();
    }





}


