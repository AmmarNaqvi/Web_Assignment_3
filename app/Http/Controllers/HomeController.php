<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Code;
use App\User;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        if (Auth::user()->role=='Moderator') {
            $codes = Code::all();
            return view('home')->with('codes', $codes);
        }
        else {
            return view('home');
        }
    }

    public function code(Request $request)
    {
        if ($request->has('code'))
        {
            $code = html_entity_decode($request->input('code'));
            //echo $code;
            Code::create([
                'code' => $request['code'],
                'user_id' => Auth::user()->id,
            ]);
            return view('home')->with('code', $code);
        }
        else {
            return view('home');
        }
    }
}
