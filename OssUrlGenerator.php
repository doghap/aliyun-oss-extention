<?php
/**
 * Created by PhpStorm.
 * User: merdan
 * Date: 11/20/17
 * Time: 12:54 PM
 */

namespace App\Media\Services;


use Plank\Mediable\UrlGenerators\BaseUrlGenerator;
use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Filesystem\FilesystemManager;

class OssUrlGenerator extends BaseUrlGenerator {

	/**
	 * Filesystem Manager.
	 * @var \Illuminate\Filesystem\FilesystemManager
	 */
	protected $filesystem;

	/**
	 * OssUrlGenerator constructor.
	 *
	 * @param Config            $config
	 * @param FilesystemManager $filesystem
	 */
	public function __construct(Config $config, FilesystemManager $filesystem)
	{
		parent::__construct($config);
		$this->filesystem = $filesystem;
	}

	/**
	 * Retrieve the absolute path to the file.
	 * For local files this should return a path
	 * For remote files this should return a url
	 *
	 * @return string
	 */
	public function getAbsolutePath() {
		return $this->getUrl();
	}

	/**
	 * Get a Url to the file.
	 *
	 * @return string
	 */
	public function getUrl() {
		$adapter = $this->filesystem->disk($this->media->disk)->getDriver()->getAdapter();
		if($this->isPubliclyAccessible()){
			return $adapter->getUrl($this->media->getDiskPath());
		}
		return $adapter->signUrl($this->media->getDiskPath());
}}
