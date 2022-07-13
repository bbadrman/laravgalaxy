<?php

namespace App\Http\Controllers;

use App\Models\Target;
use Illuminate\Http\Request;

class TargetController extends Controller
{
    public function index() { 
        $targets = Target::orderBy('ranking', 'DESC')->orderBy('created_at', 'DESC')->paginate(10);
        return view('index', compact('targets'));
    }

    public function create() {
        $targets = Target::orderBy('ranking', 'DESC')->orderBy('created_at', 'DESC')->paginate(10);  
        return view('create', compact('targets'));
    }

    public function store(Request $request){
        //1.validate date
        $this->validate(request(), 
        [
          'target' => 'required|string',
          'ranking' => 'max:2',
        ],
    [
        'target.required' => 'target must be a say someting',
        'ranking.max' => 'ranking must be less than  100',
    ]);
       //2. insert the data in databases:

        $post = new Target;
        $post->target = $request->input('target');
        $post->ranking = $request->input('ranking');
        $post->save();

    //    Target::create
    //    ([
    //       'target' => request('target'),
    //       'ranking' => request('ranking'), 
    //    ]);
       //3.redirect to url
       return redirect('/');
    }

    public function edit() {  
        $targets = Target::orderBy('ranking', 'DESC')->orderBy('created_at', 'DESC')->paginate(10);  
        return view('edit', compact('targets'));
    }
} 
