<?php

namespace UiStacks\Tasks\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class TaskTrans extends Model
{
    protected $table = 'tasks_trans';
    protected $appends = ['media'];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['task_id','main_image_id'];

    protected $casts = [
        'options' => 'array',
    ];

    /**
     * Main image relation.
     */
    public function mainImage() {
        $mediaOptions = '';
        $options = $this->options;

        if ($options && $options['media'] && isset($options['media']['main_image_id'])) {
            $mainImageId = $options['media']['main_image_id'];
            $media = \UiStacks\Media\Models\Media::find($mainImageId);
            if ($media) {
                $id = $media->id;
                $styles = $media->options['styles'];
                $mediaOptions = ['id' => $id, 'styles' => $styles];
            }
        }

        return (object) $mediaOptions;
    }

    /**
     * Get media attribute.
     */
    public function getMediaAttribute() {
        return (object) ['main_image' => $this->mainImage(), 'gallery' => $this->gallery()];
    }

    public function gallery()
    {
        $mediaOptions = [];
        $options = $this->options;
        if($options && $options['media'] && isset($options['media']['gallery_images'])){
            $galleryImagesIds = $options['media']['gallery_images'];
            $media = \App\Media::where('id', $galleryImagesIds)->get();
            if($media){
                foreach ($media as $image) {
                    $id = $image->id;
                    $styles = $image->options['styles'];
                    $mediaOptions[] = ['id' => $id, 'styles' => $styles];
                }
            }
        }
        return (object) $mediaOptions;
    }
}
