<?php


/**
 * Example test
 *
 * @copyright Copyright (c) 2013 Ledvinka Vít
 * @author Ledvinka Vít, frosty22 <ledvinka.vit@gmail.com>
 *
 */
class Example extends BaseTest {



	public function run(RemoteWebDriver $driver)
	{
		$driver->get("http://gamebazar.cz/");

		$input = $driver->findElement(WebDriverBy::id("hledathru"));
		$input->sendKeys("Grand")->submit();

		$driver->findElement(WebDriverBy::linkText("yura"))->click();

		$rank = $driver->findElement(WebDriverBy::cssSelector(".profil-hod .profil-hod span"));
		Tester\Assert::equal(" (29 hodnocení)", $rank->getText());

		$driver->findElement(WebDriverBy::linkText("baba"));
	}



}