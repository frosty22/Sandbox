<?php

namespace App\AdminModule;

/**
 *
 * @copyright Copyright (c) 2013 Ledvinka Vít
 * @author Ledvinka Vít, frosty22 <ledvinka.vit@gmail.com>
 *
 */
abstract class SecuredPresenter extends BasePresenter {


	/**
	 * Protect for secured, if not logged in redirect to the Sign
	 */
	public function startup()
	{
		parent::startup();

		if ($this->user->isLoggedIn() === FALSE) {
			$this->redirect('Sign:in', array('backlink' => $this->storeRequest()));
		}
	}


}