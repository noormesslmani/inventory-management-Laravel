<?php

namespace App\Contracts;


interface ImageServiceInterface
{
    public function decodeImage(String $base64_image): String;

}