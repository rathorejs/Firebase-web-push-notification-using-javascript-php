<html>
<head>
<title>Push notification</title>
</head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<body>

<div class="container">
  <h2>Web Notification</h2>
   <form method="post" action="send.php">
    Web Toeken : <input type="text" name="token"/><br/>
    Message : <input type="text" name="message"/><br/>
    Click URL : <input type="text" name="url"/><br/>
    <input value="submit" type="submit">
   </form>
</body>

<?php 
if($_POST){

    // set your project api access key from location (project seting > cloud messinging > server key)
    $apiAccessKey = 'AAAAmvv0iAY:APA91bEJd5Q6un_2MDRUn44iCFistpiyVrSOs2A7R9GZfJIiK5YtWBUuknp01vDEM0NxF_U6eh8qG34UC0MQki3zmb3OVaJsbPChpQ1mLEl1Wzj1xskvIzBBK1ZlayluUsQrmq8HSerO';
     $token = $_REQUEST['token'];
     $message = $_REQUEST['message'];
     $url = $_REQUEST['url'];
   
    $data = array("to" => $token , 
    "notification" => array( 
     "title" => "Testing by js",
     "body" => $message,
     "icon" => "icon.png",
      "click_action" => $url
      ));

        $data_string = json_encode($data); 
        echo "The Json Data : ".$data_string; 
        $headers = array ( 'Authorization: key='.$apiAccessKey, 'Content-Type: application/json' ); 
        $ch = curl_init(); curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' ); 
        curl_setopt( $ch,CURLOPT_POST, true ); 
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers ); 
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true ); 
        curl_setopt( $ch,CURLOPT_POSTFIELDS, $data_string); 
        $result = curl_exec($ch); 
        curl_close ($ch); 
        echo "<p>&nbsp;</p>"; 
        echo "The Result : ".$result;

    
    die;
}



?>
</html>








