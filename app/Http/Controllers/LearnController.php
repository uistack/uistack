<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use UiStacks\Tutorials\Models\Course;
use UiStacks\Tutorials\Models\Section;
use UiStacks\Tutorials\Models\Tutorial;

class LearnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$slug = null)
    {
        $slug = explode('/',$slug);
        $item = Course::where('slug', $slug[0])->where('active', 1);
        $item = $item->firstOrFail();
//        dd($item);
        $sections = Section::where('course_id', $item->id)->where('active', 1)->orderBy('order_id', 'ASC')->get();
        $contents = [];
        if(isset($slug[1])){
            $contents = Tutorial::where('slug', $slug[1])->where('active', 1)->first();
        }else{
            $sections = Section::where('course_id', $item->id)->where('active', 1)->orderBy('order_id', 'ASC')->get();
            $contents = Tutorial::where('section_id', $sections[0]->id)->where('active', 1)->first();
        }
        return view('website.learn.index', compact('item','sections','contents'));

    }

    public function learn(Request $request,$slug = null)
    {
        return view('website.learn.index', compact('item','sections','contents'));
    }

}
