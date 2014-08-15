<?php namespace ParamoreDigital\BrontoLaravel;

use Illuminate\Support\ServiceProvider;
use Bronto_Api;

class BrontoLaravelServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('bronto', function($app)
		{
			$token = $app['config']->get('bronto::token');
			$bronto = new Bronto_Api();

			if (! is_null($token)) {
				$bronto->setToken($token);
				$bronto->login();
			}

			return $bronto;
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('bronto');
	}

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('paramore/bronto-laravel', 'bronto');
	}
}
