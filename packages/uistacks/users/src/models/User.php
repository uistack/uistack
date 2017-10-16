<?php

namespace UiStacks\Users\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Notifiable;

class User extends Authenticatable
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Special data types.
     *
     * @var array
     */
    protected $casts = [
        'options' => 'array',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'phone','provider', 'provider_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token', 'active', 'created_by', 'updated_by', 'confirmation_code', 'created_at', 'updated_at', 'main_image_id', 'options'];

    /**
     * The relationships attributes that are needed.
     *
     * @var array
     */
    protected $with = ['userRole'];

    /**
     * Roles relation.
     *
     *
     */
    public function userRole()
    {
        return $this->hasOne('UiStacks\Users\Models\UserRole', 'user_id');
    }

    public function getProfileImage()
    {
        return $this->hasOne('UiStacks\Users\Models\UserRole', 'uploaded_by');
    }


    /**
     * Main image relation.
     */
    public function mainImage()
    {
        $mediaOptions = '';
        $options = $this->options;

        if($options && $options['media'] && isset($options['media']['main_image_id'])){
            $mainImageId = $options['media']['main_image_id'];


            $media = \UiStacks\Media\Models\Media::find($mainImageId);


            if($media){
                $id = $media->id;
                $file = $media->file;
                $styles = $media->options['styles'];
                $mediaOptions = ['id' => $id, 'styles' => $styles, 'file' => $file];

            }
        }

//        return $this->mediaOptions;
        return (object) $mediaOptions;
    }

    /**
     * Get media attribute.
     */
    public function getMediaAttribute()
    {

        return (object) ['main_image' => $this->mainImage()];
    }

    /**
     * Author relation.
     *
     *
     */
    public function author()
    {
        return $this->belongsTo('UiStacks\Users\Models\User', 'created_by')->select(array('id', 'name'));
    }

    /**
     * Author relation.
     *
     *
     */
    public function lastUpdatedBy()
    {
        return $this->belongsTo('UiStacks\Users\Models\User', 'updated_by')->select(array('id', 'name'));
    }

    /**
     * Account Relation.
     *
     *
     */
    // public function userAccount()
    // {
    //     return $this->hasOne('App\Account', 'user_id');
    // }

    /**
     * Country relation.
     *
     *
     */
    public function country()
    {
        return $this->belongsTo('UiStacks\Countries\Models\Country', 'country_id');
    }

    /**
     * Country Trans relation.
     *
     *
     */
    public function countryTrans()
    {
        return $this->belongsTo('UiStacks\Countries\Models\CountryTrans', 'country_id' , 'country_id')->select(array('country_id','name'));
    }

    /**
     * Area relation.
     *
     *
     */
    public function area()
    {
        return $this->belongsTo('UiStacks\Countries\Models\Area', 'area_id')->select(array('id'));
    }

    /**
     * Area Trans relation.
     *
     *
     */
    public function areaTrans()
    {
        return $this->belongsTo('UiStacks\Countries\Models\AreaTrans', 'area_id' , 'area_id')->select(array('area_id','name'));
    }

    /**
     * Scope a query to only include filterd ads name.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilterName($query)
    {
        $getName = '';
        if(isset($_GET['name']) && !empty($_GET['name'])){
            $getName = $_GET['name'];
            return $query->where('name', 'LIKE', '%'.$getName.'%');
        }
    }

    /**
     * Scope a query to only include filterd ads name.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilterRole($query, $roleId)
    {
        if($roleId == 5) {
            return $query->whereHas('userRole', function ($query) use ($roleId) {
                $query->where('role_id', $roleId);
            });
        }else{
            return $query->whereHas('userRole', function ($query) use ($roleId) {
                $query->where('role_id', '!=', 5);
            });
        }
    }


    public function hasPermission()
    {
        return $this->hasMany('UiStacks\Users\Models\PermissionUser', 'user_id');

    }

    public function hasRole()
    {
        return $this->hasOne('UiStacks\Users\Models\UserRole', 'user_id')->select("role_id");

    }
}
