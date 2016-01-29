<?php

namespace SS\TwitterBundle\Api;
use Abraham\TwitterOAuth\TwitterOAuth;

/*
* Author Salem Said : salem.said.ing@gmail.com
* TwitterApi Service
*/
Class TwitterApi {

    /*
     * Stores the datasift api Key
     * @var string
     */
    protected $apiKey;

    /*
     * Stores the datasift api Key Secret
     * @var string
     */
    protected $apiKeySecret;

    /*
     * Stores the datasift access Token
     * @var string
     */
    protected $accessToken;

    /*
     * Stores the datasift Twitter OAuth Object
     * @var TwitterOAuth
     */
    protected $twitter;

    /* set the dependencies
     * @param string $apiKey
     * @param string $apiKeySecret
     * @param string $accessToken
     * @param TwitterOAuth $twitter
     *
     */
    public function __construct($apiKey, $apiKeySecret){
        $this->apiKey = $apiKey;
        $this->apiKeySecret = $apiKeySecret;
        $oauth = new TwitterOAuth($this->apiKey, $this->apiKeySecret);
        $accessToken = $oauth->oauth2('oauth2/token', ['grant_type' => 'client_credentials']);
        $this->access_token = $accessToken->access_token;
        $this->twitter = new TwitterOAuth( $this->apiKey,  $this->apiKeySecret, null, $this->access_token);
    }

    public function getUserTimeLine($screen_name, $count){
        $tweets =  $this->twitter->get('statuses/user_timeline', [
            'screen_name' => $screen_name,
            'exclude_replies' => true,
            'count' => $count
        ]);

        return $tweets;
    }
}