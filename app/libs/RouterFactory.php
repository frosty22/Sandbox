<?php

namespace App;

use Nette,
	Nette\Application\Routers\RouteList,
	Nette\Application\Routers\Route,
	Nette\Application\Routers\SimpleRouter;


/**
 * Router factory.
 */
class RouterFactory
{

	/**
	 * @return \Nette\Application\IRouter
	 */
	public function createRouter()
	{
		$router = new RouteList();

		$router[] = $admin = new RouteList("Admin");
		$admin[] = new Route('admin/<presenter>/<action>', 'Homepage:default');

		$router[] = $front = new RouteList("Front");
		$front[] = new Route('<presenter>/<action>', 'Homepage:default');

		return $router;
	}

}

