<?php namespace Ramonvic\L4Pusher\Logger;

/*
 * This file is part of L4Pusher.
 *
 * (c) Ramon Vicente <ramonvic@me.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class Logger
{
    public function log($message) {
        \Log::debug($message);
    }
}