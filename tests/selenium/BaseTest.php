<?php


/**
 *
 * @copyright Copyright (c) 2013 Ledvinka Vít
 * @author Ledvinka Vít, frosty22 <ledvinka.vit@gmail.com>
 *
 */
abstract class BaseTest {


	/**
	 * @param RemoteWebDriver $driver
	 * @return void
	 */
	abstract function run(RemoteWebDriver $driver);

}