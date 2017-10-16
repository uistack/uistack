<?php 
namespace UiStacks\Media\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;

use UiStacks\Media\Models\Media;


class MediaController extends Controller
{
 	/*
    |--------------------------------------------------------------------------
    | UiStacks Media Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles Media for the application.
    |
    */


    /**
     * 
     *
     * @param  
     * @return 
     */
    public function index()
    {
        $media = Media::paginate(10);

        return view('Media::index', compact('media'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function upload()
    {
        return view('Media::upload');
    }


    /**
     * 
     *
     * @param  
     * @return 
     */
    public function storeFile(Request $request)
    {
        
        $file = $request->file;
        $destinationPath = 'uploads';
        $randomName = date('Y-M-d--h--i--sa').'-'.str_random(5).'-'.$file->getClientOriginalName();
        
        $media = new Media;
        $media->name = $file->getClientOriginalName();
        $media->mime_type = $file->getMimeType();
        $media->extension = $file->getClientOriginalExtension();
        $media->file_size = \filesize($file);

        $movedFile = $file->move($destinationPath, $randomName);
        $media->file = $movedFile;
        
        // Options
        $options = $media->options;

        // Languages
        $languages = ['en', 'ar'];
        foreach ($languages as $lang) {
            $options['trans'][$lang]['title'] = $media->name;
            $options['trans'][$lang]['caption'] = 'file caption';
            $options['trans'][$lang]['alt'] = 'image alt';
        }

        // Styles
        $styles = ['thumbnail', 'medium', 'large'];

        foreach ($styles as $style) {
            $options['styles'][$style] = '/'.$style.'/'.$randomName;
        }
        // create an image manager instance with favored driver
        $imageManager = new ImageManager(array('driver' => 'GD'));

        $smallPath = 'uploads/small/'.$randomName;
        $small = $imageManager->make($movedFile)->fit(150);
        
        File::exists(public_path('uploads/small')) or File::makeDirectory(public_path('uploads/small'));

        $small->save($smallPath, 100);

        $options['styles']['small'] = $smallPath;

        $media->options = $options;
        if(Auth::user()){
            $media->uploaded_by = Auth::user()->id;
        }
        $media->save();

        
        return redirect('/media');
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function edit($id)
    {
        $media = Media::findOrFail($id);
        return view('Media::edit', compact('media'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function update(Request $request, $id)
    {

        $media = Media::find($id);

        // Options
        $options = $media->options;

        // Languages
        $languages = ['en', 'ar'];
        foreach ($languages as $lang) {
            $options['trans'][$lang]['title'] = $media->name;
            $options['trans'][$lang]['caption'] = 'file caption';
            $options['trans'][$lang]['alt'] = 'image alt';
        }

        // Styles
        // $styles = ['thumbnail', 'medium', 'large'];

        // foreach ($styles as $style) {
        //     $options['styles'][$style] = '/'.$style.'/'.$randomName;
        // }
       
        $media->options = $options;
        $media->save();

        return redirect('/media');
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function confirmDelete($id)
    {
        $media = Media::findOrFail($id);
        return view('Media::confirm-delete', compact('media'));
    }

    public function delete($id)
    {
        $media = Media::findOrFail($id);
        $media->delete();

        return redirect('/media');
    }
}