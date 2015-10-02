<?php namespace Ramonvic\L4Pusher;

/*
 * This file is part of L4Pusher.
 *
 * (c) Ramon Vicente <ramonvic@me.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use \Pusher as PusherApi;

class Pusher extends PusherApi implements Contracts\Pusher
{

    public function __construct( $auth_key, $secret, $app_id, $options = array(), $host = null, $port = null, $timeout = null )
    {
        parent::__construct( $auth_key, $secret, $app_id, $options, $host, $port, $timeout );

        $defaultLogger = new Logger\Logger();

        $this->set_logger($defaultLogger);
    }
}