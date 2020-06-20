# Firebase-web-push-notification-using-javascript-php
It's simplest wey to implement firebase website push notficaiton on your website.


# Create account on firebase 

URL - https://console.firebase.google.com

# Steps

1 Create project after login in firebase <br>
2 Go > Cloud messaging > Click on code ICON  <br>
3 Register app with App nickname <br>
4 After register the app this will give you some java script code with APP_KEY and Other informaction, so copy this code and using in shared code.
<br>


# For SERVER_KEY 

Go in Project setting > Cloud messaging > Copy server key and use in send.php file for send notficaiton

# How to use 

When you run receive.php file in your browser this will ask for messaging permission if not ask of any reason click on url lock and allow from there. <br>
After this reload your page your device token will be show in your web page in 5 secound.(you can also copy token from console log)<br>
Copy this token and open send.php file in your browser enter your token here with message and url. <br>
You will receive push notification on receive.php file 

