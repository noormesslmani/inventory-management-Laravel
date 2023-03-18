<?php

namespace App\Contracts\Service;


interface ImageServiceInterface
{
    public function decodeImage(String $base64_image): String;

}