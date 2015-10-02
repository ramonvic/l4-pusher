<?php namespace Ramonvic\L4Pusher;

/*
 * This file is part of L4Pusher.
 *
 * (c) Ramon Vicente <ramonvic@me.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Support\ServiceProvider;

class PusherServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('ramonvic/l4-pusher');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register() {

	    // Register 'pusher' instance container to our 'Pusher' object
		$this->app->bindShared('Ramonvic\L4Pusher\Contracts\Pusher', function($app)
		{

			$config = $app['config'];

			// connect to pusher
			$pusher = new \Pusher(
				$config['l4-pusher::auth_key'],
				$config['l4-pusher::secret'],
				$config['l4-pusher::app_id'],
				$config['l4-pusher::options'],
				$config['l4-pusher::host'],
				$config['l4-pusher::port'],
				$config['l4-pusher::timeout']
			);

			return $pusher;
		});

	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return ['Ramonvic\L4Pusher\Contracts\Pusher'];
	}

}

