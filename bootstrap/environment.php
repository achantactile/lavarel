<?php 
/*
|--------------------------------------------------------------------------
| Detect The Application Environment
|--------------------------------------------------------------------------
|
| Laravel takes a dead simple approach to your application environments
| so you can just specify a machine name for the host that matches a
| given environment, then we will automatically detect it for you.
|
*/
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Request;	
$name = Request::server("SERVER_NAME");

$env = $app->detectEnvironment(function(){
	
	if ($name == 'dev-scotchbox-test.com'){
		$setEnv = 'dev';
	}else if ($name == 'prod.scotch.com'){
		$setEnv = 'prod';
	}

$environmentPath = __DIR__.'/../.env';
//$setEnv = trim(file_get_contents($environmentPath));
	if (file_exists($environmentPath))
	{
	putenv("APP_ENV=$setEnv");
		if (getenv('APP_ENV') && file_exists(__DIR__.'/../.' .getenv('APP_ENV') .'.env')) {
		Dotenv::load(__DIR__ . '/../', '.' . getenv('APP_ENV') . '.env');
		} 
	}
	
	
});