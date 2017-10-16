<?php
namespace UiStacks\Articles\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use UiStacks\Articles\Models\Article;
use UiStacks\Articles\Models\ArticleTrans;
use Illuminate\Support\Facades\Input;
use Auth;

class ArticlesApiController extends Controller
{
    /*
   |--------------------------------------------------------------------------
   | uistacks Articles API Controller
   |--------------------------------------------------------------------------
   |
   */

    /**
     *
     *
     * @param
     * @return
     */
    public function validatation($request)
    {

//        dd($request);
        $languages = config('uistacks.locales');

//        $rules['name'] = 'required';
//        $rules['description'] = 'required';
//        $rules['article_status'] = 'required';
        $rules['article_url'] = 'unique:articles';
        $rules = [];
        if(count($languages)) {
            foreach ($languages as $key => $language) {
                $code = $language['code'];
                if($request->language){
                    foreach($request->language as $lang){
                        $rules['name_'.$code.''] = 'required|max:40';
                        $rules['description_'.$code.''] = 'required|min:10';
                    }
                }
            }
        }
        return \Validator::make($request->all(), $rules);
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function listStaticItems(Request $request)
    {
        $articles = Article::FilterName()->FilterCategory()->FilterSection()->FilterStatus()->orderBy('id', 'DESC')->where('id','<',5)->paginate($request->get('paginate'));
        $articles->appends(Input::except('article'));
        return $articles;
    }

    
      public function listItems(Request $request)
    {
        $articles = Article::FilterName()->FilterCategory()->FilterSection()->FilterStatus()->orderBy('id', 'DESC')->paginate($request->get('paginate'));
        $articles->appends(Input::except('article'));
        return $articles;
    }
    
    
    /**
     *
     *
     * @param
     * @return
     */
    public function storeArticle(Request $request)
    {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $article = new Article;
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }
        $article->article_url = $this->seoUrl($request->name_en);
        $article->active = false;
        if ($request->active) {
            $article->active = true;
        }
        $article->published = true;
        $article->article_type = false;
        if ($request->article_type) {
            $article->article_type = true;
        }
        $article->created_by = $author;
        $article->updated_by = $author;
        $article->save();

        foreach ($request->language as $langCode) {
            $name = 'name_'.$langCode;
            $description = 'description_'.$langCode;
            $article_seo_title = 'article_seo_title_'.$langCode;
            $article_meta_keywords = 'article_meta_keywords_'.$langCode;
            $article_meta_description = 'article_meta_description_'.$langCode;
            //transaction entry
            $articleTrans = new ArticleTrans;
            $articleTrans->article_id = $article->id;
            $articleTrans->name = $request->$name;
            $articleTrans->description = $request->$description;
            $articleTrans->article_seo_title = $request->$article_seo_title;
            $articleTrans->article_meta_keywords = $request->$article_meta_keywords;
            $articleTrans->article_meta_descriptions = $request->$article_meta_description;
            $articleTrans->lang = $langCode;
            $articleTrans->save();
        }

        $response = ['message' => trans('Articles::articles.saved_successfully')];
        return response()->json($response, 201);
    }
// Get SEO URL function here
    function seoUrl($text) {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        // trim
        $text = trim($text, '-');
        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);
        // lowercase
        $text = strtolower($text);
        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function updateArticle(Request $request, $apiKey = '', $id)
    {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $article = Article::find($id);
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }
//        $article->article_url = strtolower($request->name_en);
        $article->active = false;
        if ($request->active) {
            $article->active = true;
        }
        $article->published = true;
        $article->article_type = false;
        if ($request->article_type) {
            $article->article_type = true;
        }
        $article->updated_by = $author;
        $article->save();

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;
            $description = 'description_' . $langCode;
            $article_seo_title = 'article_seo_title_' . $langCode;
            $article_meta_keywords = 'article_meta_keywords_' . $langCode;
            $article_meta_description = 'article_meta_description_' . $langCode;
            $articleTrans = ArticleTrans::where('article_id', $article->id)->where('lang', $langCode)->first();
            if (empty($articleTrans)) {
                $articleTrans = new ActivityTrans;
                $articleTrans->article_id = $article->id;
                $articleTrans->lang = $langCode;
            }
            $articleTrans->name = $request->$name;
            $articleTrans->description = $request->$description;
            $articleTrans->article_seo_title = $request->$article_seo_title;
            $articleTrans->article_meta_keywords = $request->$article_meta_keywords;
            $articleTrans->article_meta_descriptions = $request->$article_meta_description;
            $articleTrans->save();
        }
        $response = ['message' => trans('Articles::articles.updated_successfully')];
        return response()->json($response, 201);
    }

}