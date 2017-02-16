<?php

// ctwitter_max3.php
//
// this code replaces twitterStreamMaxGeo.php for the Twitter v1.1 API requiring Oauth
//
// You will need to create a Twitter App from your account and replace the fields below with
// your: consumer key, consumer secret, access token, and access secret - strings
//
// A simple class to access the Twitter streaming API, with OAuth authentication
//
//	Mike (mike@mikepultz.com)
//
// Simple Example:
require 'osc-twitter-api.php';

$terms = array();
foreach ($argv as $key => $value) {
    if ($key > 0) {
        array_push($terms, $value);
    }
}

$t = new TwitterStream();
$t->login(getenv("TWITTER_CONSUMER_KEY"),getenv("TWITTER_CONSUMER_SECRET"),getenv("TWITTER_ACCESS_TOKEN"),getenv("TWITTER_ACCESS_SECRET");
$t->start($terms);
$t->start(array(), array('-180','-90','180','90'));    // search entire world for geo-coded tweets;
