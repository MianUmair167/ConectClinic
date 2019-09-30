<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Site\SiteController;
use App\Models\FileUpload;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageController extends SiteController
{
    /**
     * uplaod image
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadImage(Request $request)
    {
        if($request->file('file'))
        {
            $file = $request->file('file');
            $name = time() . $file->getClientOriginalName();

            if(!file_exists(public_path('images/'))) {
                mkdir(public_path('images/'));
            }

            Image::make($file)
                ->save(public_path('images/').$name);
        }

        $image= new FileUpload();
        $image->image_name = $name;
        $image->table = $request->get('table');
        $image->table_temp_id = $request->get('table_temp_id');
        $image->table_id = $request->get('table_id');
        $image->slug = $request->get('slug');
        $image->save();

        return response()->json([
            'status' => true,
        ], 200);
    }
}
