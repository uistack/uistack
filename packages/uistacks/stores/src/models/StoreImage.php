<?php

namespace UiStacks\Stores\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class StoreImage extends Model
{
    protected $table = 'stores_images';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    protected $hidden = ['store_id'];

    protected $casts = [
        'options' => 'array',
    ];

    public function gallery()
    {
        $mediaOptions = [];
        $options = $this->options;
        if($options && $options['media'] && isset($options['media']['gallery_images'])){
            $galleryImagesIds = $options['media']['gallery_images'];
            $media = \App\Media::where('id', $galleryImagesIds)->get();
            // dd($media);
            if($media){
                foreach ($media as $image) {
                    $id = $image->id;
                    $styles = $image->options['styles'];
                    $mediaOptions[] = ['id' => $id, 'styles' => $styles];
//                    dd($mediaOptions);
//                    $this->mediaOptions = $mediaOptions;
                }
            }
        }
        return (object) $mediaOptions;
//        return $this->mediaOptions;
    }

}