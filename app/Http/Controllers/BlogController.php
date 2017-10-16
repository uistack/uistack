<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use UiStacks\Blogs\Models\Blog;
use UiStacks\Blogs\Models\BlogTrans;
use Auth;
use Lang;
use UiStacks\Blogs\Models\Comment;
use UiStacks\Blogs\Models\CommentTrans;
use UiStacks\Users\Controllers\UsersApiController as API;
use UiStacks\Settings\Models\Setting;
use Config;
use Mail;
use UiStacks\Ads\Models\Section;
use Validator;

class BlogController extends Controller {

    public function __construct() {
        $this->api = new API;
    }

    /**
     * Overide Defualt Mail Settings.
     *
     * @return Response
     */
    public function setMailSettings() {
        Config::set('mail.driver', Setting::find(5)->value);
        Config::set('mail.host', Setting::find(6)->value);
        Config::set('mail.port', Setting::find(7)->value);
        Config::set('mail.username', Setting::find(8)->value);
        Config::set('mail.password', Setting::find(9)->value);
        Config::set('mail.from.address', Setting::find(10)->value);
        Config::set('mail.from.name', Setting::find(11)->value);
        Config::set('mail.encryption', Setting::find(12)->value);
    }

    /**
     * Show page
     *
     * @var view
     */
    public function index(Request $request) {
        $items = Blog::where(array('active'=>'1'))->get();
        $webmeta['title'] = "Blog";
        $webmeta['keywords'] = "php tutorial , web development , website development , ruby tutorial , ruby on rails tutorial , mean stack , meanstack , nodejs tutorial, mongodb tutorial , learn php online , learn ruby on rails online , learn nodejs online.";
        $webmeta['description'] = "Learn web technology online , web development solutions";
        return view('website.blogs.index', compact('webmeta','items', 'trans'));
    }
    /*
     * Function to show blog detail
     */
    function detail(Request $request,$slug=''){
        $item = Blog::where(array('slug'=>$slug))->first();
        if(count($item) == null){
            \Session::flash('alert-class', 'alert-danger');
            \Session::flash('message', "Record not found!");
            return back()->withInput();
        }
        $comments = Comment::where(array('post_id'=>$item->id))->get();
        $webmeta['title'] = $item->trans->seo_title;
        $webmeta['keywords'] = $item->trans->meta_keywords;
        $webmeta['description'] = $item->trans->meta_description;
//        dd($comments);
        return view('website.blogs.detail', compact('webmeta','item','comments'));
    }
    /*
    *post comment
    */
    function comment(Request $request, $slug){
        $item = Blog::where(array('slug'=>$slug))->first();
        if(count($item) == null){
            \Session::flash('alert-class', 'alert-danger');
            \Session::flash('message', "Record not found!");
            return back()->withInput();
        }
        $this->validate($request, [
            'comment' => 'required'
        ]);
        if(isset($slug)) {
            $cur_lang = Lang::getlocale();
            $comment = new Comment;
            $author = Auth::user()->id;
            $comment->parent_id = 0;
            if ($request->comment_id) {
                $comment->parent_id = $request->comment_id;
            }
            $comment->post_id = $request->post_id;
            $comment->from_user = $author;
            $comment->active = 1;
            $comment->save();
            $commentTrans = new CommentTrans;
            $commentTrans->comment_id = $comment->id;
            $commentTrans->body = $request->comment;
            $commentTrans->lang = isset($cur_lang) ? $cur_lang : "en";
            $commentTrans->save();
//            return redirect()->back()->with('success','send campaign successfully');
            return redirect(action('BlogController@detail',$slug));

        } else {
            return redirect()->back()->with('error','Something went wrong, please try again!');
        }
    }
}
