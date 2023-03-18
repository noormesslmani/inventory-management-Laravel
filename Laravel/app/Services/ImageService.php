<?php

namespace App\Services;


use Symfony\Component\HttpFoundation\Response;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Contracts\Service\ImageServiceInterface;

class ImageService implements ImageServiceInterface
{
    
    public function decodeImage(?string $base64_image): string
    {
        if ($base64_image=='')
            return 'no-image.png';
            
        $code64 = explode(',', $base64_image);
        $decoded_img = base64_decode($code64[1]);
        $extension = explode(";", explode('/', $code64[0])[1])[0];
        $path =  uniqid() . "." . $extension;
        file_put_contents('images/' . $path, $decoded_img);
        return $path;
    }

}