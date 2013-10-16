<?php

/**
 *
 * @copyright Copyright (c) 2013 Ledvinka Vít
 * @author Ledvinka Vít, frosty22 <ledvinka.vit@gmail.com>
 *
 */
class Logger {


	/**
	 * @var string
	 */
	private $filename;


	/**
	 * @var string
	 */
	private $result;


	/**
	 * @var \DateTime
	 */
	private $time;


	/**
	 * @param string $dir
	 * @throws \Exception
	 */
	public function __construct($dir)
	{
		if (!is_dir($dir))
			throw new \Exception("Output dir $dir must exists.");

		$this->filename = $dir . "/" . time() . ".log";
		$this->time = new \DateTime();
	}


	/**
	 * @param BaseTest $test
	 * @param Exception $e
	 */
	public function log(BaseTest $test, Exception $e)
	{
		$result = $this->format($test, $e);
		$this->result .= $result;
		echo $result;
	}


	/**
	 * @return string
	 */
	public function getResult()
	{
		return $this->result;
	}


	/**
	 * Save log and print results
	 * @param int $tests
	 * @param int $failed
	 */
	public function save($tests = 0, $failed = 0)
	{
		$content = "====================================" . PHP_EOL;
		$content .= "Totaly runned \033[1;32m$tests\033[0m tests, and \033[1;31m$failed\033[0m tests failed." . PHP_EOL;

		$diff = $this->time->diff(new \DateTime(), TRUE);
		$content .= "Time of all tests \033[0;33m" . $diff->format("%H:%I:%S") . "\033[0m" . PHP_EOL;
		$content .= "... reported at \033[1;30m" . date("j. n. Y H:i:s") . "\033[0m" . PHP_EOL;

		$this->result .= PHP_EOL . PHP_EOL . $content;

		echo $content;
		file_put_contents($this->filename, $this->result);
	}


	/**
	 * Format exception for string (CMD)
	 * @param BaseTest $test
	 * @param Exception $e
	 * @return string
	 */
	public function format(BaseTest $test, Exception $e)
	{
		$content = "TEST: \033[1;34m" . get_class($test) . "\033[0m" . PHP_EOL;

		$content .= \Tester\Dumper::dumpException($e);

		$content .= "-------------------------------------" . PHP_EOL;
		return $content;
	}


}