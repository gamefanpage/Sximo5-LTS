<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get ('/', 'HomeController@index');
Route::controller ('home', 'HomeController');

Route::controller ('/user', 'UserController');
include ('pageroutes.php');
include ('moduleroutes.php');

Route::get ('/restric', function ()
{

	return view ('errors.blocked');

});

Route::resource ('sximoapi', 'SximoapiController');
Route::group (['middleware' => 'auth'], function ()
{

	Route::get ('core/elfinder', 'Core\ElfinderController@getIndex');
	Route::post ('core/elfinder', 'Core\ElfinderController@getIndex');
	Route::controller ('/dashboard', 'DashboardController');
	Route::controllers ([
		'core/users'    => 'Core\UsersController',
		'notification'  => 'NotificationController',
		'core/logs'     => 'Core\LogsController',
		'core/pages'    => 'Core\PagesController',
		'core/groups'   => 'Core\GroupsController',
		'core/template' => 'Core\TemplateController',
	]);

});

Route::group (['middleware' => 'auth', 'middleware' => 'sximoauth'], function ()
{

	Route::controllers ([
		'sximo/menu'   => 'Sximo\MenuController',
		'sximo/config' => 'Sximo\ConfigController',
		'sximo/module' => 'Sximo\ModuleController',
		'sximo/tables' => 'Sximo\TablesController'
	]);


});

Route::resource ('sximoapi', 'SximoapiController');

// SiteMap Generator : https://github.com/RoumenDamianoff/laravel-sitemap

Route::get ('sitemap', function ()
{

	// create new sitemap object
	$sitemap = App::make ("sitemap");

	// set cache key (string), duration in minutes (Carbon|Datetime|int), turn on/off (boolean)
	// by default cache is disabled
	$sitemap->setCache ('laravel.sitemap', 60);

	// check if there is cached sitemap and build new only if is not
	if (!$sitemap->isCached ())
	{
		// add item to the sitemap (url, date, priority, freq)
		$sitemap->add (URL::to ('/'), '2016-01-18T10:30:00+02:00', '1.0', 'daily');
		$sitemap->add (URL::to ('home'), '2016-01-18T12:30:00+02:00', '0.9', 'hourly');
		$sitemap->add (URL::to ('about-us'), '2016-01-18T12:30:00+02:00', '0.9', 'hourly');
		$sitemap->add (URL::to ('portfolio'), '2016-01-18T12:30:00+02:00', '0.9', 'hourly');
		$sitemap->add (URL::to ('contact-us'), '2016-01-18T12:30:00+02:00', '0.9', 'hourly');
		$sitemap->add (URL::to ('blog'), '2016-01-18T12:30:00+02:00', '0.9', 'hourly');
	}

	// show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
	return $sitemap->render ('xml');

});
Route::get ('mysitemap', function ()
{

	// create new sitemap object
	$sitemap = App::make ("sitemap");

	// add items to the sitemap (url, date, priority, freq)

	$sitemap->add (URL::to ('/'), '2016-01-18T10:30:00+02:00', '1.0', 'daily');
	$sitemap->add (URL::to ('home'), '2016-01-18T12:30:00+02:00', '0.9', 'hourly');
	$sitemap->add (URL::to ('about-us'), '2016-01-18T12:30:00+02:00', '0.9', 'hourly');
	$sitemap->add (URL::to ('portfolio'), '2016-01-18T12:30:00+02:00', '0.9', 'hourly');
	$sitemap->add (URL::to ('contact-us'), '2016-01-18T12:30:00+02:00', '0.9', 'hourly');
	$sitemap->add (URL::to ('blog'), '2016-01-18T12:30:00+02:00', '0.9', 'hourly');

	// generate your sitemap (format, filename)
	$sitemap->store ('xml', 'sitemap');
	// this will generate file mysitemap.xml to your public folder
});




