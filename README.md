# aliyun-oss-extention
A simple extention of https://github.com/jacobcyl/AJacobcyl\AliOSS\AliOssServiceProvider::classl in your `config/app.php`iyun-oss-storage. 

Added `signUrl()` function to generate signed url and `getTemporaryUrl()` function to generate tempprary url using `Storage::temporaryUrl()`.

Use `\App\Media\Providers\AliOssServiceProvider::class` in `config/app.php` instead of `Jacobcyl\AliOSS\AliOssServiceProvider::class`
