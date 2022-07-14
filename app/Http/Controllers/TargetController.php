<?php

namespace App\Http\Controllers;

use App\Models\Target;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function store(Target $targets, Request $request){
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

        $targets = new Target;
        $targets->target = $request->input('target');
        $targets->ranking = $request->input('ranking');
        $targets->save();

    //    Target::create
    //    ([
    //       'target' => request('target'),
    //       'ranking' => request('ranking'), 
    //    ]);
       //3.redirect to url
       return redirect('/');
    }

    public function edit(Target $target) {  
        $targets = Target::orderBy('ranking', 'DESC')->orderBy('created_at', 'DESC')->paginate(10);  
        return view('edit', compact('targets', 'target'));
    }

    public function update(Request $request, $id){
        
        $v=$request->input('target');
        DB::update('update targets set target=? where id=?',[ $v,$id]);

    
        return redirect('/');
    }
    public function delete(Target $target){
        $target->delete();
        return back();
    }
} 
