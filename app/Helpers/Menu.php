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
				'icon' 		=> 'reorder',
				'active' 	=> \Ekko::isActiveRoute('backend.category.*') ? true : false,
				'visible' 	=> true,
			],
			[
				'label' 	=> 'Post',
				'url' 		=> 'backend.post.index',
				'icon' 		=> 'feed',
				'active' 	=> \Ekko::isActiveRoute('backend.post.*') ? true : false,
				'visible' 	=> true,
			],
			[
				'label' 	=> 'Custom Post',
				'url' 		=> 'backend.item.index',
				'icon' 		=> 'file',
				'active' 	=> \Ekko::isActiveRoute('backend.item.*') ? true : false,
				'visible' 	=> true,
			],
			[
				'label' 	=> 'Page',
				'url' 		=> 'backend.page.index',
				'icon' 		=> 'file',
				'active' 	=> \Ekko::isActiveRoute('backend.page.*') ? true : false,
				'visible' 	=> true,
			],
			[
				'label' 	=> 'Contact',
				'url' 		=> 'backend.contact.index',
				'icon' 		=> 'envelope-open-o',
				'active' 	=> \Ekko::isActiveRoute('backend.contact.*') ? true : false,
				'visible' 	=> true,
			],
			[
				'label' 	=> 'Social Media',
				'url' 		=> 'backend.socialmedia.index',
				'icon' 		=> 'facebook-square',
				'active' 	=> \Ekko::isActiveRoute('backend.socialmedia.*') ? true : false,
				'visible' 	=> true,
			],
			[
				'label' 	=> 'Company Profile',
				'url' 		=> 'backend.profile.index',
				'icon' 		=> 'user',
				'active' 	=> \Ekko::isActiveRoute('backend.profile.*') ? true : false,
				'visible' 	=> true,
			],
		];
	}
}	