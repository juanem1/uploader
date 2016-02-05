<?php

namespace Ibox\Uploader;

class Uploader
{

    private $disk;

    public function __construct() 
    {
        $this->disk = env('UPLOADER_DISK', 'local');
    }

    /**
     * Upload all images
     * @param $images Array 
     * @param $path String Destination path
     * @return Array The name of the stored image
     */
    public function upload($images, $path = '/img/')
    {
        // Store image names
        $names = [];

        foreach($images as $file) {
            $names[] = $this->makeUpload($file, $path);
        }

        return $names;
    }

    /**
     * Upload a single image
     * @param $file Object 
     * @param $path String
     * @return String Image name
     */
    private function makeUpload($file, $path) 
    {
        // Get file name
        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        
        // Create safe name with extension 
        $name = str_slug($filename) . '.' . $file->getClientOriginalExtension();

        // Upload
        \Storage::disk($this->disk)->put($path . $name, file_get_contents($file->getRealPath()));


        return $name;
    }

}