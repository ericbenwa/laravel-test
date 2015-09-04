<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::get('/', function()
// {
// 	return View::make('simple');
// });


Route::get('/authors', array('as'=>'authors', 'uses'=>'AuthorsController@getIndex'));

Route::get('/authors/new', array('as'=>'new_author', 'uses'=>'AuthorsController@getNew'));

Route::post('/authors/create', array('uses'=>'AuthorsController@postCreate'));

Route::get('/authors/{id}/edit', array('as'=>'edit_author', 'uses'=>'AuthorsController@getEdit'));

Route::get('/authors/{id}', array('as'=>'author', 'uses'=>'AuthorsController@getView'));

Route::put('/authors/update', array('uses'=>'AuthorsController@putUpdate'));

Route::delete('author/delete', array('uses'=>'AuthorsController@deleteDestroy'));

// below is toying with, above is perkins tutorial items

Route::get('/exercise', function()
{
	return 'viewing my exercises';
});

Route::get('/profile', function()
{
	return 'viewing my profile';
});

// fucking around

// Route::get('examples', function($squirrel)
// {
// 	$data['squirrel'] = $squirrel;
// 	return View::make('example', $data);
// });

Route::get('first', function()
{
	return Redirect::to('second');
});

Route::get('second', function()
{
	return 'second route.';
});

Route::get('users', function()
{
	$users = User::all();

	return View::make('users')->with('users', $users);
});

Route::get('authtest', array('before' => 'auth.basic', function()
{
    return View::make("hello auth tester");
}
));

Route::get('my/page', function() 
{
	return 'Hello fucker!';
});

Route::get('books', function()
{
	if (Auth::guest()) return Redirect::to('login');
});

Route::get('login', function() 
{
	return 'login yo!';
});

Route::get('custom/response', function()
{
	$response = Response::make('hello world', 200);
	$response->headers->set('our key', 'our value');
	return $response;
});

Route::get('markdown/response', function()
{
	$data = array('iron', 'man', 'rocks');
	return Response::json($data);
});

Route::get('our/response', function()
{
	$response = Response::make('bond, james bond', 200);
	$response->setTtl(60);
	return $response;
});

Route::get('file/download', function()
{
	$file = 'test.png';
	return Response::download($file, 418, array('iron', 'man'));
});

Route::filter('birthday', 'BirthdayFilter');

Route::get('/', array('before' => 'birthday:10/12', function()
{
	return View::make('hello');
}));

Route::get('index', 'ArticleController@showIndex');

// Route::controller('article', 'Blog\Controller\Article');

Route::get('blading', function($taylorTheVampireSlayer)
{
	$data['Tommy'] = $taylorTheVampireSlayer;
	return View::make('example', $data);

	// return 'viewing my blades';
});

Route::get('example', function()
{
	return View::make('example');
});

Route::get('template', function()
{
	return View::make('home');
});

Route::get('my/long/calendar/route', array(
	'as' => 'calendar',
	function() {
		return View::make('calendar');
	}
));

Route::get('secret/content', array(
	'https',
	function() {
		return 'secret !!!!';
	}
));

Route::get('save/{princess}/{unicorn}', function($princess, $unicorn)
{
	return "Sorry, {$princess} loves {$unicorn}. :(";
}) ->where('princess', '[A-Za-z]+')
	->where('unicorn', '[0-9]+');

Route::group(array('before' => 'onlybrogrammers'), function()
{
	//first route
	Route::get('/11', function() {
		return 'dude';
	});

	Route::get('/22', function() {
		return 'duuuuuude';
	});

	Route::get('/33', function() {
		return 'come at me bro';
	});
});

Route::group(array('domain' => '{user}.myapp.dev'), function()
{
	Route::get('profile/{page}', 
		function($user, $page) {

		});
});

Route::get('/current/url', function()
{
	return URL::full();
});

Route::get('yolo', function()
{
	return Redirect::to('froyo');
});

Route::get('froyo', function()
{
	return URL::previous();
});

Route::get('linky', function()
{
	return URL::secure('another/source', array('foo', 'bar'));
});

Route::get('the/{first}/avenger/{second}', array('as' => 'ironman', function($first, $second)
{
	return "tony stark, the {$first} avenger {$second}";
}));

Route::get('marvel', function()
{
	return URL::route('ironman', array('best', 'ever'));
});

class Stark extends BaseController {
	public function tony($whatIsTony) {
		return 'you can count on me, to pleasure myself';
	}
}

Route::get('tony/the/{first}/genious/{lastone}', 'Stark@tony');

Route::get('toot', function() {
	return URL::action('Stark@tony', array('narcissist' ,'yum'));
});

Route::get('photo', function()
{
	return URL::secureAsset('test.png');
});

// $myDataProvider = new Laravel\Input\Request\Access\Data;
// $data = $myDataProvider->getDataFromRequest('example');

// Route::get('/', function()
// {
// 	$data = Input::all();
// 	var_dump($data);
// });

Route::get('/', function()
{
	return View::make('form');
});

Route::post('handle-form', function()
{
	Input::file('book')->move('/storage/test');
	return 'File was moved.';
});

Route::get('new/request', function()
{
	var_dump(Input::old());
});

Route::get('post-form', function()
{
	return View::make('form');
});

// Route::get('birthday', function()
// {
// 	// return View::make('birthday');
// });

// Route::get('/', array(
// 	'before' => 'birthday:11/16', function()
// 	{
// 		return View::make('hello');
// 	}
// ));

// Route::get('/', array('before' => 'birthday:foo,bar,baz', function()
// {
// 	return View::make('hello');
// }));

// Route::get('/books/{genre?}', function($genre = 'Crime')
// {
// 	return "books in the {$genre} category";
// });