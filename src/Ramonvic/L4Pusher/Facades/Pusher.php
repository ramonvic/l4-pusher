<?php namespace Ramonvic\L4Pusher\Facades;

/*
 * This file is part of L4Pusher.
 *
 * (c) Ramon Vicente <ramonvic@me.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Support\Facades\Facade;

class Pusher extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'Ramonvic\L4Pusher\Contracts\Pusher'; }

}