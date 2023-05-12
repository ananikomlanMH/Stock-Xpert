<?php
namespace App\Helpers\FileUrlHelper;

class FileUrl{

    /**
     * @param string $key
     * @param string|null $path
     * @return string
     */
    public static function getUrl(string $key, ? string $path = null): string
    {
        try {
            if ($path == null) $path = path_public;
            $file = json_decode(file_get_contents($path. DIRECTORY_SEPARATOR. 'vendors/dist/' .'manifest.json'), true)[$key];
            return '/vendors/dist/'.$file;
        }catch (\Exception $e){
            if (strpos($key, 'css') != false){
                return '/vendors/css/'.$key;
            }
            return '/vendors/dist/'.$key;
        }
    }
}
