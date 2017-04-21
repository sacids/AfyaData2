<?php

/**
 * Created by PhpStorm.
 * User: renfrid
 * Date: 4/18/17
 * Time: 2:05 PM
 */
class Messaging
{
    private $_ci;

    private $api_key;
    private $sms_push_url;
    private $user;
    private $service_id;

    function __construct()
    {
        $this->_ci = &get_instance();
        $this->_ci->load->database();
        log_message('debug', 'Messaging Library Initialized');

        $this->api_key = 'HaPbQDXbUtCBd9CWlkfmB56QdvA8kIGwb41qklNS';
        $this->sms_push_url = 'http://msdg.ega.go.tz/msdg/public/quick_sms';
        $this->user = 'kadefue@sua.ac.tz';
        $this->service_id = 93;
    }

    //push message
    function push_sms($phone, $message, $sender)
    {
        $date_time = date('Y-m-d H:i:s');

        $message = array(
            'recipients' => $phone,
            'message' => $message,
            'datetime' => $date_time,
            'sender_id' => $sender,
            'mobile_service_id' => $this->service_id
        );
        //post_data
        $post_data = array('data' => json_encode($message), 'datetime' => $date_time);

        //HASH the JSON with the generated user API key using SHA-256 method.
        $hash = hash_hmac('sha256', $post_data['data'], $this->api_key, true);

        //Encode the hash using Base 64 Encode method
        $base64_value = base64_encode($hash);

        //http_header
        $http_header = array(
            'X-Auth-Request-Hash:' . $base64_value,
            'X-Auth-Request-Id:' . $this->user,
            'X-Auth-Request-Type:api'
        );

        //Initialise connection using PHP CURL
        $ch = curl_init();

        //set option of URL to post to
        curl_setopt($ch, CURLOPT_URL, $this->sms_push_url);

        //set option of request method -----HTTP POST Request
        curl_setopt($ch, CURLOPT_POST, true);

        //The HTTP Header
        curl_setopt($ch, CURLOPT_HTTPHEADER, $http_header);

        //This line sets the parameters to post to the URL
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

        //This line makes sure that the response is gotten back to the $response object(see below) and not echoed
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //This line executes the RPC call
        $response = curl_exec($ch); //and assigns the result to $response object

        //return code
        $return_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        //Close the stream
        curl_close($ch);

        return $response;
    }

}