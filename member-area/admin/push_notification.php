<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require("../includes/dbconnection.php");
require_once("../includes/mysql-compat.php");

// Check database connection
if (!isset($conn) || !$conn) {
    die("Database connection failed. Please contact the administrator.");
}
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
if (isset($_REQUEST['title'])&&
    !empty($_REQUEST['title'])&&
    isset($_REQUEST['body'])&&
    !empty($_REQUEST['body'])&&
    isset($_REQUEST['token'])&&
    !empty($_REQUEST['token'])){
        
    $token = $_REQUEST['token'];
    $tokens = [$token];
    $title = $_REQUEST['title'];
    $body = $_REQUEST['body'];
    $task_id= $_REQUEST['task_id'];
    
    $message_status = send_notification($tokens, $title,$body,$task_id);
    
    echo $message_status;
    
    }
   
   function send_notification($tokens, $title,$body,$task_id)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $fields = array(
             'registration_ids' => $tokens,
             'notification' => array(
                                    "title" => $title,
                                    "body" => $body, ),
            //  'data' => array(),
            );

        $headers = array(
            'Authorization: key=AAAAPqbFT6g:APA91bHLOKJKKEdfTBBz8M1JXAee747IKilyd8AuyXZ_rikrosWdnOlPhpWLHCrQdPOTPuIIOTkc6IaCs9Weef1VMXnCR9RPv3ZCUyXMC1z7mm33kB7qfq22uBGwGDrkZ9-545u9j9wc',
            'Content-Type: application/json'
            );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        if ($result === false) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }
    ?>
    