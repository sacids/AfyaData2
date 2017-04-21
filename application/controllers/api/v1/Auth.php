<?php defined('BASEPATH') OR exit('No direct script access allowed');

use \Restserver\Libraries\REST_Controller;

/**
 * Created by PhpStorm.
 * User: renfrid
 * Date: 4/18/17
 * Time: 11:28 AM
 */
class Auth extends REST_Controller
{
    private $sender;

    public function __construct($config = 'rest')
    {
        parent::__construct($config);

        $this->sender = '15200';
    }

    //login function
    function login_get()
    {
        if (!$this->get('code') && !$this->get('mobile')) {
            //response
            $response = array('error' => TRUE, 'error_msg' => 'Required parameter are missing');
            $this->response($response, 202);

        } else {
            //post variable
            $mobile = $this->get('mobile');
            $code = $this->get('code');

            //concatenate country code and mobile
            $phone = $code . $mobile;

            //check if phone exist in database
            $user = $this->db->get_where('users', array('phone' => $phone))->row();

            if (count($user) > 0) {
                //send verification code
                $this->send_sms($user->phone, $user->sms_code);

            } else {
                //create sms code
                $sms_code = rand(100000, 999999);

                $email = 'noreply@sacids.org';
                $password = '12345678';

                $additional_data = array(
                    'phone' => $phone,
                    'sms_code' => $sms_code
                );

                //insert user details
                $this->ion_auth->register($phone, $password, $email, $additional_data);

                //send verification code
                $this->send_sms($phone, $sms_code);
            }
            //response
            $response = array(
                'error' => FALSE,
                'success_msg' => 'Verification code will be sent to your mobile soon'
            );
            $this->response($response, 201);
        }
    }

    //verify confirmation code
    function verify_get()
    {
        if (!$this->get('code')) {
            //response
            $response = array('error' => TRUE, 'error_msg' => 'Required parameter are missing');
            $this->response($response, 202);
        } else {
            $code = $this->get('code');
            $mobile = $this->get('mobile');

            //check if phone exist in database
            $user = $this->db->get_where('users', array('phone' => $mobile))->row();

            if ($user) {
                //response
                $response = array('error' => FALSE, 'success_msg' => 'User created', 'user' => $user);
                $this->response($response, 201);
            } else {
                $response = array('error' => TRUE, 'error_msg' => 'Failed to create user');
            }
        }
    }


    //send sms
    function send_sms($mobile, $code)
    {
        $code_prefix = ':';
        $message = "Afyadata code is '$code_prefix $code'";
        $message_id = $this->generate_id();

        //TODO: save message to database

        //function to send sms
        $this->messaging->push_sms($mobile, $message, $this->sender);
    }

    /**
     * generate id
     * @return string
     */
    public function generate_id()
    {
        //set the random id length
        $random_id_length = 12;

        //generate a random id encrypt it and store it in $rnd_id
        $rnd_id = uniqid(rand(), 1);

        //finally I take the first 4 characters from the $rnd_id
        $rnd_id = substr($rnd_id, 0, $random_id_length);
        return $rnd_id;
    }

}