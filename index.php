<?php

require_once __DIR__ . '/vendor/autoload.php';
session_start();

$fb = new Facebook\Facebook([
    'app_id' => '1647702962149555',
    'app_secret' => '44d6b3c66b2ad9846cfd91d1d42439ed',
    'default_graph_version' => 'v2.5',
]);

$helper = $fb->getCanvasHelper();
$permissions = ['user_photos']; // optionnal
try {
    if (isset($_SESSION['facebook_access_token'])) {
        $accessToken = $_SESSION['facebook_access_token'];
    } else {
        $accessToken = $helper->getAccessToken();
    }
} catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}
if (isset($accessToken)) {
    if (isset($_SESSION['facebook_access_token'])) {
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    } else {
        $_SESSION['facebook_access_token'] = (string) $accessToken;
        // OAuth 2.0 client handler
        $oAuth2Client = $fb->getOAuth2Client();
        // Exchanges a short-lived access token for a long-lived one
        $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
        $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }
    // validating the access token
    try {
        $request = $fb->get('/me');
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        if ($e->getCode() == 190) {
            unset($_SESSION['facebook_access_token']);
            $helper = $fb->getRedirectLoginHelper();
            $loginUrl = $helper->getLoginUrl('https://apps.facebook.com/newfbappi/', $permissions);
            echo "<script>window.top.location.href='".$loginUrl."'</script>";
        }
        exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
    // getting all photos of user
    try {
        $photos_request = $fb->get('/me/photos?limit=100&type=uploaded');
        $photos = $photos_request->getGraphEdge();
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
    $all_photos = array();
    if ($fb->next($photos)) {
        $photos_array = $photos->asArray();
        $all_photos = array_merge($photos_array, $all_photos);
        while ($photos = $fb->next($photos)) {
            $photos_array = $photos->asArray();
            $all_photos = array_merge($photos_array, $all_photos);
        }
    } else {
        $photos_array = $photos->asArray();
        $all_photos = array_merge($photos_array, $all_photos);
    }
    foreach ($all_photos as $key) {
        $photo_request = $fb->get('/'.$key['id'].'?fields=images');
        $photo = $photo_request->getGraphNode()->asArray();
        echo '<img src="'.$photo['images'][2]['source'].'"><br>';
    }
    // Now you can redirect to another page and use the access token from $_SESSION['facebook_access_token']
} else {
    $helper = $fb->getRedirectLoginHelper();
    $loginUrl = $helper->getLoginUrl('https://apps.facebook.com/newfbappi/');
    echo "<script>window.top.location.href='".$loginUrl."'</script>";
}