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

    public function edit() {  
        $targets = Target::orderBy('ranking', 'DESC')->orderBy('created_at', 'DESC')->paginate(10);  
        return view('edit', compact('targets'));
    }
} 
