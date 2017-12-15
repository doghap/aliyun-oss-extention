<?php
/**
 * Created by PhpStorm.
 * User: merdan
 * Date: 11/20/17
 * Time: 4:20 PM
 */

namespace App\Media\Services;

use Carbon\Carbon;
use OSS\OssClient;

class AliOssAdapter extends \Jacobcyl\AliOSS\AliOssAdapter {

	/**
	 * 支持生成get和put签名, 用户可以生成一个具有一定有效期的
	 * 签名过的url
	 *
	 * @param        $path
	 * @param int    $timeout
	 * @param string $method
	 * @param null   $options
	 *
	 * @return string
	 * @throws \OSS\Core\OssException
	 * @author Merdan
	 */
	public function signUrl($path, $timeout = 60, $method = OssClient::OSS_HTTP_GET, $options = NULL) {
		return $this->client->signUrl($this->bucket, $path, $timeout, $method, $options);
	}

	/**
	 * 生成临时链接
	 *
	 * @param       $path
	 * @param       $expiration
	 * @param array $options
	 *
	 * @return string
	 * @throws \OSS\Core\OssException
	 * @author Merdan
	 */
	public function getTemporaryUrl($path, $expiration = 60, array $options = []) {
		if($expiration instanceof Carbon){
			$expiration = $expiration->diffInSeconds(Carbon::now());
		}

		$expiration = intval($expiration);
		return $this->client->signUrl($this->bucket, $path, $expiration, OssClient::OSS_HTTP_GET, $options);
	}
}
