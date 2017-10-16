<?php

namespace UiStacks\Articles\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class ArticleTrans extends Model
{
    protected $table = 'articles_trans';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['article_id'];
    protected $fillable = ['name', 'description','lang','article_seo_title','article_meta_keywords','article_meta_descriptions'];
}
