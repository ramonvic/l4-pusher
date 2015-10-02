<?php namespace Ramonvic\L4Pusher\Contracts;

/*
 * This file is part of L4Pusher.
 *
 * (c) Ramon Vicente <ramonvic@me.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

interface Pusher
{


    /**
     * Fetch the settings.
     * @return array
     */
    public function getSettings();

    /**
     * Set a logger to be informed of internal log messages.
     */
    public function set_logger( $logger );

    /**
     * Build the required HMAC'd auth string
     *
     * @param string $auth_key
     * @param string $auth_secret
     * @param string $request_method
     * @param string $request_path
     * @param array $query_params
     * @param string $auth_version [optional]
     * @param string $auth_timestamp [optional]
     * @return string
     */
    public static function build_auth_query_string($auth_key, $auth_secret, $request_method, $request_path,
                                                   $query_params = array(), $auth_version = '1.0', $auth_timestamp = null);

    /**
     * Implode an array with the key and value pair giving
     * a glue, a separator between pairs and the array
     * to implode.
     * @param string $glue The glue between key and value
     * @param string $separator Separator between pairs
     * @param array $array The array to implode
     * @return string The imploded array
     */
    public static function array_implode( $glue, $separator, $array );

    /**
     * Trigger an event by providing event name and payload.
     * Optionally provide a socket ID to exclude a client (most likely the sender).
     *
     * @param array $channels An array of channel names to publish the event on.
     * @param string $event
     * @param mixed $data Event data
     * @param int $socket_id [optional]
     * @param bool $debug [optional]
     * @return bool|string
     */
    public function trigger( $channels, $event, $data, $socket_id = null, $debug = false, $already_encoded = false );

    /**
     *	Fetch channel information for a specific channel.
     *
     * @param string $channel The name of the channel
     * @param array $params Additional parameters for the query e.g. $params = array( 'info' => 'connection_count' )
     *	@return object
     */
    public function get_channel_info($channel, $params = array() );

    /**
     * Fetch a list containing all channels
     *
     * @param array $params Additional parameters for the query e.g. $params = array( 'info' => 'connection_count' )
     *
     * @return array
     */
    public function get_channels($params = array());

    /**
     * GET arbitrary REST API resource using a synchronous http client.
     * All request signing is handled automatically.
     *
     * @param string path Path excluding /apps/APP_ID
     * @param params array API params (see http://pusher.com/docs/rest_api)
     *
     * @return See Pusher API docs
     */
    public function get( $path, $params = array() );

    /**
     * Creates a socket signature
     *
     * @param int $socket_id
     * @param string $custom_data
     * @return string
     */
    public function socket_auth( $channel, $socket_id, $custom_data = false );

    /**
     * Creates a presence signature (an extension of socket signing)
     *
     * @param int $socket_id
     * @param string $user_id
     * @param mixed $user_info
     * @return string
     */
    public function presence_auth( $channel, $socket_id, $user_id, $user_info = false );
}