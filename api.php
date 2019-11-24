<?php
require_once('TwitterAPIExchange.php');

// Set access tokens here 
$settings = array(
    'oauth_access_token' => "1196620416250368000-9cLZplAXGWT89WX89JViD4gCKXyqim",
    'oauth_access_token_secret' => "bNRnzuuW75UvEIjlHEu3ezHQx5YvlJr3XCYq78moPVtnL",
    'consumer_key' => "WcH06HUxRUsYg0dE69r2gyUtw",
    'consumer_secret' => "iaP7nMLNtxjVp9jyp7IHMCO8t0U4cz1BZ68IJSqdkaAMqeVSVU"
);

$url = 'https://api.twitter.com/1.1/search/tweets.json';
$requestMethod = 'GET';
$getfield = '?q=#Kidspot&result_type=recent';

// Perform the request
$twitter = new TwitterAPIExchange($settings);
echo $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();