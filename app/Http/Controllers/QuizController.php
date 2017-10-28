<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use UiStacks\Uiquiz\Models\Topic;
use UiStacks\Uiquiz\Models\Question;
use UiStacks\Uiquiz\Models\QuestionsOption;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$slug = null)
    {
        //get all active questions from table
        $topic = Topic::where('slug',$slug)->first();
        $items = Question::where('topic_id',$topic)->get();
        dd($items);
        return view('website.quiz.index', compact('items'));

    }

    public function show(Request $request)
    {
        dd($request);
    }

}
