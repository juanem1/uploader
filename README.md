# Laravel File Uploader

# Installation
Begin by installing this package through Composer. Edit your project's composer.json file to require ibox/uploader

```json
"require": {
    "ibox/uploader": "~1.0"
}
```

Next, update Composer from the terminal:
```
composer update
```

Once this operation completes, the final step is to add the service provider. Open config/app.php, and add a new item to the providers array.
```
Ibox\Uploader\UploaderServiceProvider::class
```

> NOTE: By default all uploaded files will be stored in public/img folder.  
> You can change this behavior publishing the config file.
```
php artisan vendor:publish
```

# Configure
Under config folder you will find **ibox.uploader.php** update *disk* key to change the default storage method.

Default option: *local*. Available options: *local* or *s3*
```
'disk' => env('IBOX_UPLOADER_DISK', 'local')
```

# Usage
Example:

In your HTML:
```html
<form action="/images" enctype="multipart/form-data" method="post">
	<input type="file" name="image" multiple="multiple" required />
    <input type="submit" value="Upload" />
</form>
```

In your controller:
```php
<?php

use Ibox\Uploader\Uploader;
class ImagesController extends Controller 
{

	public function store(Request $request, Uploader $uploader)
    {
        $path = 'some/path';
        $imageNames = $uploader->upload($request->file(), $path);
    }

}
```

# License
This package is open source software licensed under the [MIT license](http://opensource.org/licenses/MIT) 
