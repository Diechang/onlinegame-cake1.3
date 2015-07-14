<?php
/**
 * Short description for file.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/views/pages/home.ctp)...
 */
	//Site Index
	Router::connect('/',
					array('controller' => 'pages', 'action' => 'home'));
	Router::connect('/index',
					array('controller' => 'pages', 'action' => 'home'));
	//Titles
	Router::connect('/titles/:path/single/vote:voteid',
					array('controller' => 'titles', 'action' => 'single'),
					array('pass' => array('path', 'voteid')));
	Router::connect('/titles/:path/event/event:eventid',
					array('controller' => 'titles', 'action' => 'event'),
					array('pass' => array('path', 'eventid')));
	Router::connect('/titles/:path/:action',
					array('controller' => 'titles'),
					array('pass' => array('path')));
//	Router::connect('/titles/:path',
//					array('controller' => 'titles', 'action' => 'index'),
//					array('pass' => array('path')));
	//Portals
	Router::connect('/portals/index',
					array('controller' => 'portals', 'action' => 'index'));
	Router::connect('/portals/:path',
					array('controller' => 'portals', 'action' => 'view'),
					array('pass' => array('path')));
	//Monies
	Router::connect('/monies/index',
					array('controller' => 'monies', 'action' => 'index'));
	Router::connect('/monies/:path',
					array('controller' => 'monies', 'action' => 'view'),
					array('pass' => array('path')));
	//Categories, Styles, Services, fees, ranking
	Router::connect('/:controller/add',
					array('action' => 'add'));
	Router::connect('/:controller/:path',
					array('action' => 'index'),
					array('pass' => array('path') , 'controller' => 'categories|styles|services|fees|ranking|links'));
	//Review
	Router::connect('/review/:page',
					array('controller' => 'review' , 'action' => 'index' , 'page' => 1));
	//Review
	Router::connect('/events/:page',
					array('controller' => 'events' , 'action' => 'index' , 'page' => 1));
	//
	//Sys
	Router::connect('/sys', array('controller' => 'pages', 'action' => 'home' , 'sys' => true));
	Router::connect('/sys/login', array('controller' => 'users', 'action' => 'login' , 'sys' => true));
	Router::connect('/sys/logout', array('controller' => 'users', 'action' => 'logout' , 'sys' => true));
//	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
 	//Pages
//	Router::connect('/pages/sitemap', array('controller' => 'pages', 'action' => 'sitemap'));
//	Router::connect('/pages/jump', array('controller' => 'pages', 'action' => 'jump'));
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

	Router::parseExtensions('html', 'rss', 'xml');
?>