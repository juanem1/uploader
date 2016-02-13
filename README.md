# Laravel File Uploader
This package take advantage of the Laravel [Filesytem](https://laravel.com/docs/5.2/filesystem) library.

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

# Configure
In config/filesystems.php update default and cloud keys. This library will upload all files to the default option.

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
