<?php

namespace App\Http\Controllers;

use App\Models\AdminInformation;
use App\Models\Book;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;


class LoadImageController extends Controller
{
    use ApiResponder;

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function libraryImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'image|required|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        if ($validator->fails()) {
            return $this->badRequestResponse(null, $validator->errors()->toJson());
        }

        $file= $request->file('image');
        $file_name = time().rand(111111111,9999999999).'.'.$file->getClientOriginalExtension();
        $path = '/uploads/images';
        $storagePath = storage_path('app'.$path);
        if(!File::exists($storagePath)){
            File::makeDirectory($storagePath,0755,true);
        }
        Image::make($file->getRealPath())->save($storagePath."/".$file_name,40,"jpg");

        $admin_info = AdminInformation::where('user_id', Auth::id())->first();
        $admin_info->update([
            $admin_info->image = $path . "/" . $file_name
        ]);

        return $this->okResponse(null, 'image loaded successfully');
    }

    public function bookImage(Request $request, Book $book)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'image|required|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
        if ($validator->fails()) {
            return $this->badRequestResponse(null, $validator->errors()->toJson());
        }

        $file= $request->file('image');
        $file_name = time().rand(111111111,9999999999).'.'.$file->getClientOriginalExtension();
        $path = '/uploads/images';
        $storagePath = storage_path('app'.$path);
        if(!File::exists($storagePath)){
            File::makeDirectory($storagePath,0755,true);
        }
        Image::make($file->getRealPath())->save($storagePath."/".$file_name,40,"jpg");

        $book->update([
            $book->image = $path . "/" . $file_name
        ]);

        return $this->okResponse(null, 'image loaded successfully');
    }
}
