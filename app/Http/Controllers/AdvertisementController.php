<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;
use Facade\Ignition\Middleware\AddLogs;
use Illuminate\Foundation\Console\Presets\React;

class AdvertisementController extends Controller
{
    //
    public function index()
    {
        return view('advertisements.index');
    }

    public function get(Request $request)
    {
        dd($request);
        $lang = $request['language'];
        $gender = $request['gender'];
        $freeword = $request['freeword'];
        return view('advertisements.index')->with(['advertisements' => Advertisement::all()->where('language',$lang)->where('gender',$gender)->where('body',$freeword)->get()]);
    }

    public function show(Advertisement $advertisement)
    {
        return view('advertisements.show')->with(['advertisement' => $advertisement]);
    }

    public function create()
    {
        return view('advertisements.create');
    }

    public function store(Request $request, Advertisement $advertisement)
    {
        $input = $request->all();
        $advertisement->fill($input)->save();
    }
}
