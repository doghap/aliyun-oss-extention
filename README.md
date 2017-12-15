# aliyun-oss-extention
A simple extention of https://github.com/jacobcyl/Aliyun-oss-storage

## Changes
Extended AliOssAdapter and added `signUrl()` function to generate signed url and `getTemporaryUrl()` function to generate temporary url using `Storage::temporaryUrl()`.

## Require
- https://github.com/jacobcyl/Aliyun-oss-storage

In your `config/app.php` add this line to providers array:
```php
\App\Media\Providers\AliOssServiceProvider::class,
```
## Usage
See [Laravel doc for Storage](https://laravel.com/docs/5.2/filesystem#custom-filesystems)
Or you can learn here:

> First you must use Storage facade

```php
use Storage;
```    
> Then You can use `temporaryUrl` function of Storage

```php
Storage::temporaryUrl('path/to/img.jpg', now()->addMinutes(5)) // 5 minutes
Storage::temporaryUrl('path/to/img.jpg', 60) // 60 second
```
