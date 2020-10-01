<?php

namespace App\Helpers;

class UploadFile
{
    public static function uploadBase64(String $base64, String $path) : string
    {
        $image     = base64_decode($base64);
        $imgName = uniqid() . '-' . time() . '-' . str_random(10) . '.jpg';
        $p = public_path().'/images/' . $path .'/';
        file_put_contents($p . $imgName, $image);
        return (string) $imgName;
    }

    public static function uploadImage ($image, String $path) : string
    {
        $extension = $image->getClientOriginalExtension();
        $imgName = uniqid() . '-' . time() . '-' . str_random(10) . '.' . $extension;
        $p = public_path().'/images/' . $path;
        $image->move($p, $imgName);
        return (string) $imgName;
    }

    public static function uploadImageOnUpdate ($oldImage , $image , String $path) : string
    {
        $image_path = public_path()."/images/".$path.'/'.$oldImage;
        if ($oldImage != 'default.png') {
            if (File_exists($image_path)) {
                @unlink($image_path);
            }
        }

        $extension = $image->getClientOriginalExtension();
        $imgName = uniqid() . '-' . time() . '-' . str_random(10) . '.' . $extension;
        $p = public_path().'/images/' . $path;
        $image->move($p, $imgName);
        return (string) $imgName;
    }

    public static function uploadImageWaterMark ($image,  $path)
    {
        $watermark = Image::make(public_path('images/site/logo.png'))->resize(80, 80)->opacity(100);
        $img = Image::make($image);
        $resizePercentage = 80;
        $watermarkSize = round($img->width() * ((100 - $resizePercentage) / 100), 2);
        $watermark->resize($watermarkSize, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $thumbsPath             = 'images/' . $path;
        $name                   = time().'_'. rand(1111,9999).'.png';
        $img->insert($watermark, 'bottom-left', 20, 20)->save($thumbsPath . '/' . $name);
        return (string) $name;
    }

    public static function unLinkImage($image,$path)
    {
        $image_path = public_path()."/images/".$path.$image;
        if ($image != 'default.png') {
            if (File_exists($image_path)) {
                @unlink($image_path);
            }
        }
    }
}