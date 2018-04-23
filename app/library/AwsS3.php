<?php
/*
 * @Author: 172999@gmail.com
 */
//use AWS SDK3 for PHP
//require_once APP_PATH . '/../framework/aws.phar';

class AwsS3
{
	public $s3Client;
	public $bucket;
	private static $instance = [];

	const ACL_FLAG =  'public-read';

	public static function &getInstance($credentials, $bucket) {
		if(!isset(self::$instance[$bucket])) {
			self::$instance[$bucket] = new AwsS3($credentials, $bucket);
		}
		return self::$instance[$bucket];
	}

	private function __construct($credentials, $bucket) {
		$this->s3Client = \Aws\S3\S3Client::factory([
			'credentials' => $credentials,
			'region' => $credentials['region'],
			'version' => 'latest'
		]);

		$this->bucket = $bucket;
	}

	public function putObject($sourceFile, $keyName, $aclFlag=self::ACL_FLAG) {
		return $this->s3Client->putObject([
			'Bucket' => $this->bucket,
			'Key' => $keyName,
			'SourceFile' => $sourceFile,
			'ACL' => $aclFlag,
		]);
	}

	public function getObject($file, $destFile) {
		return $this->s3Client->getObject([
			'Bucket' => $this->bucket,
			'Key' => $file,
			'SaveAs' => $destFile
		]);
	}
}