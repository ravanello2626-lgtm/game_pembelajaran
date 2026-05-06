<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Pos;

class AdminController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('admin.index', compact('questions'));
    }

    public function create()
    {
        $pos = Pos::all();
        return view('admin.create', compact('pos'));
    }

    public function store(Request $request)
    {
        Question::create($request->all());
        return redirect('/admin');
    }

    public function delete($id)
    {
        Question::find($id)->delete();
        return redirect('/admin');
    }
}