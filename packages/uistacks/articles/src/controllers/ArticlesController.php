<?php 
namespace UiStacks\Articles\Controllers;

use Illuminate\Http\Request;
use UiStacks\Articles\Controllers\ArticlesApiController as API;
use UiStacks\Articles\Models\Article;
use UiStacks\Articles\Models\ArticleTrans;
use Illuminate\Support\Facades\Lang;
//use UiStacks\Articles\Models\Section;

class ArticlesController extends ArticlesApiController
{

 	/*
    |--------------------------------------------------------------------------
    | uistacks Articles Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles Articles for the application.
    |
    */
    public function __construct()
    {
        $this->api = new API;
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function index(Request $request)
    {
        $request->request->add(['paginate' => 20]);
        $items = $this->api->listStaticItems($request);
//        $sections = Section::get();
//        dd($items);
        return view('Articles::articles.index', compact('items'));
    }
    
    /**
     * 
     *
     * @param  
     * @return 
     */
    public function create()
    {
//        $sections = Section::get();
        return view('Articles::articles.create-edit', compact('sections'));
    }


    /**
     * 
     *
     * @param  
     * @return 
     */
    public function store(Request $request)
    {
        $store = $this->api->storeArticle($request);
        $store = $store->getData();
        
        if(isset($store->errors)){
            return back()->withInput()->withErrors($store->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $store->message);

        if($request->back){
            return back();
        } 
        return redirect(Lang::getlocale() . "/" . 'admin/articles');
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function edit($id)
    {
        $item = Article::findOrFail($id);
        $trans = ArticleTrans::where('article_id', $id)->get()->keyBy('lang')->toArray();
//        $sections = Section::get();
        return view('Articles::articles.create-edit', compact('item', 'trans'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function update(Request $request, $id)
    {
        $update = $this->api->updateArticle($request, '', $id);
        $update = $update->getData();
        
        if(isset($update->errors)){
            return back()->withInput()->withErrors($update->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $update->message);
        
        if($request->back){
            return back();
        } 
        //return redirect(action('\UiStacks\Articles\Controllers\ArticlesController@dynamic-articles'));
    return redirect(Lang::getlocale() . "/" . 'admin/articles');
        }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function confirmDelete($id)
    {
        $item = Article::findOrFail($id);
        return view('Articles::ads.confirm-delete', compact('item'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function bulkOperations(Request $request)
    {
        if($request->ids){
            $items = Article::whereIn('id', $request->ids)->get();
            if($items->count()){
                foreach ($items as $item) {
                    // Do something with your model by filter operation
                    if($request->operation && $request->operation === 'activate'){
                        $item->active = true;
                        $item->save();
                        \Session::flash('message', trans('Core::operations.activated_successfully')); 
                    }elseif($request->operation && $request->operation === 'deactivate'){
                        $item->active = false;
                        $item->save();
                        \Session::flash('message', trans('Core::operations.deactivated_successfully')); 
                    }

                }
            }

            \Session::flash('alert-class', 'alert-success');
            
        }else{
            \Session::flash('alert-class', 'alert-warning');
            \Session::flash('message', trans('Core::operations.nothing_selected')); 
        }
        return back();
    }
}