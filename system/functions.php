<?php

function set_url($url)
{
    echo ("<script>history.replaceState({},'','$url');</script>");
}

function getMimeType($filename)
{
    $mimetype = false;
    if(function_exists('finfo_open')) {
        // open with FileInfo
    } elseif(function_exists('getimagesize')) {
        // open with GD
    } elseif(function_exists('exif_imagetype')) {
       // open with EXIF
    } elseif(function_exists('mime_content_type')) {
       $mimetype = mime_content_type($filename);
    }
    return $mimetype;
}