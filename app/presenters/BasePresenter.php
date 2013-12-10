<?php

namespace App;

/**
 *
 * @copyright Copyright (c) 2013 Ledvinka Vít
 * @author Ledvinka Vít, frosty22 <ledvinka.vit@gmail.com>
 *
 */
abstract class BasePresenter extends \Ale\Application\UI\Presenter {


	/**
	 * @persistent
	 * @var string
	 */
	public $backlink;


	/**
	 * @param string $name
	 * @param \ComposerComponents\Control\Control $control
	 * @return \ComposerComponents\Control\Control
	 */
	protected function createComponentComponents($name, \ComposerComponents\Control\Control $control)
	{
		return $control;
	}

}