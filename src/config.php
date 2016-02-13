<?php

return [

    /**
     * Here you can define how will be your default storage.
     * Default: local
     * Available options: 'local', 's3' 
     */
    'disk' => env('IBOX_UPLOADER_DISK', 'local')

];