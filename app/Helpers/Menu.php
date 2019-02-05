<?php 
namespace App\Helpers;
use Request;

class Menu
{
	public static function getArrOfMenu()
	{
		return [
			[
				'label' 	=> 'Home',
				'url' 		=> 'backend.home',
				'icon' 		=> 'home',
				'active' 	=> \Ekko::isActiveRoute('backend.home') ? true : false,
				'visible' 	=> true,
			],
			[
				'label' 	=> 'Post Category',
				'url' 		=> 'backend.category.index',
				'icon' 		=> 'file',
				'active' 	=> \Ekko::isActiveRoute('backend.category.index') ? true : false,
				'visible' 	=> true,
			],
			[
				'label' 	=> 'Post',
				'url' 		=> 'backend.post.index',
				'icon' 		=> 'file',
				'active' 	=> \Ekko::isActiveRoute('backend.post.index') ? true : false,
				'visible' 	=> true,
			],
			[
				'label' 	=> 'Page',
				'url' 		=> 'backend.page.index',
				'icon' 		=> 'file',
				'active' 	=> \Ekko::isActiveRoute('backend.page.index') ? true : false,
				'visible' 	=> true,
			],
			[
				'label' 	=> 'Contact',
				'url' 		=> 'backend.contact.index',
				'icon' 		=> 'file',
				'active' 	=> \Ekko::isActiveRoute('backend.contact.index') ? true : false,
				'visible' 	=> true,
			],
		];
	}
}	