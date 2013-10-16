<?php

require __DIR__ . '/../../vendor/autoload.php';

/** Folder with tests */
$testsDir = __DIR__ . "/AppTests";

/** Folder for results */
$outputDir = __DIR__ . "/output";

/** Selenium server URI */
$host = 'http://localhost:4444/wd/hub';

/** Define capabilities (browsers etc.) */
$capabilities = array(WebDriverCapabilityType::BROWSER_NAME => 'firefox');

date_default_timezone_set("Europe/Prague");


/** Run tests */
require_once __DIR__ . "/BaseTest.php";
require_once __DIR__ . "/Logger.php";

$driver = new RemoteWebDriver($host, $capabilities);
$logger = new Logger($outputDir);

try {
	$tests = \Nette\Utils\Finder::findFiles("*.phpt")->in($testsDir);
	$all = $failed = 0;
	foreach ($tests as $filename => $file) {
		/** @var SplFileInfo $file */
		require_once $filename;

		$testClassName = $file->getBasename("." . $file->getExtension());

		if (!class_exists($testClassName))
			throw new \Exception("Excepted class $testClassName in $filename.");

		$class = new $testClassName;

		if (!$class instanceof BaseTest)
			throw new \Exception("Test class $testClassName must inherited BaseTest.");

		Tester\Assert::$onFailure = function(\Tester\AssertException $e) use ($logger, $class) {
			$logger->log($class, $e);
		};

		$all++;
		try {
			$class->run($driver);
		} catch (\Exception $e) {
			$failed++;
			$logger->log($class, $e);
		}

	}

} catch (\Exception $e) {
	$logger->save($all, $failed);
	$driver->close();

	throw $e;
}

$logger->save($all, $failed);
$driver->close();
