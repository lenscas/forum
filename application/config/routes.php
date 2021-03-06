<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
//browser
	//normal users
		//users 
			$route['login']				=	"browser/users/Users/login";
			$route['register']			=	"browser/users/Users/register";
			$route['register/success']	=	"browser/users/Users/showMade";
			$route['activation/(:any)']	=	"browser/users/Users/activate/$1";
			$route['logout']			=	"browser/users/Users/logout";
			$route['profile']			=	"browser/users/Users/profile";
		//threads
			$route['category/(:any)']	=	"browser/users/Threads/showThreadsInCategory/$1";
			$route['thread/(:any)']		=	"browser/users/Threads/showThread/$1";
	//admins
		//basic
			$route['admin/index']		=	"browser/admins/Basic/dashboard";
		//categories
			$route['admin/categories/create']	=	"browser/admins/Categories/createCategorie";
//ajax
	//normal users
		//users
			$route['ajax/register']	=	"ajax/users/Users/register";
			$route['ajax/login']	=	"ajax/users/Users/login";
			$route['ajax/profile/(:any)']	=	"ajax/users/Users/profile/$1";
			$route['ajax/users/update/theme/(:any)']	=	"ajax/users/Users/themeSelect/$1";
		//threads
			$route['ajax/threads/delete/(:any)/(:any)']	=	"ajax/users/Threads/delete/$1/$2";
			$route['ajax/threads/create']	=	"ajax/users/Threads/create";

			$route['ajax/threads/(:any)/(:any)']	=	"ajax/users/Threads/getThreadsBy/$1/$2";
		//posts
			$route['ajax/posts/create']	=	"ajax/users/Posts/create";
			$route['ajax/posts/(:any)']	=	"ajax/users/Posts/getPostsByThreadCode/$1";
			
	//admins
		//categories
			$route['ajax/admin/categories/getAllRules']	=	"ajax/admins/Categories/getAllRules";
			$route['ajax/admin/categories/create']		=	"ajax/admins/Categories/create";
