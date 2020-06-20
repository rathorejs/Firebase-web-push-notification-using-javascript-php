<html>
<head>
<title>Push notification</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<body>

<div class="container">
  <h2>Web Notification</h2>
  <div class="modal modal-info fade" id="modal-order-info" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">New Order</h4>
            </div>
            <div class="modal-body">
                <p id="model-order-info-body">&nbsp;</p>
            </div>
            <!-- <div class="modal-footer">
                <a type="button" id="model-order-info-action" class="btn btn-outline pull-left" href="modal">View Order</a>
            </div> -->
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    Your device token is : <span id="deviceToken"></span>
</div>
</body>

<script type="text/javascript" src="https://www.gstatic.com/firebasejs/4.5.0/firebase.js"></script>
<script type="text/javascript" src="./firebase-web-push.js"></script>
<script>
jQuery(document).ready(function () {
    
    function sendTokenToServer(token) {
            if(token){
                // $.get(baseurl + 'path/'+token, function(data) {
                //     console.log(data);
                // });
            }
        } 
        
        /** get web device token */
        var push = new FirebasePush(function(token){
            $("#deviceToken").html(token);
            console.log('token recieved ::: ' + token);
            //sendTokenToServer(token);
        });

        /** update token on server if change */
        push.onTokenRefreshed = function(toeken) {
            //sendTokenToServer(token);
        };
        
        /** show message in popup if page is open */
        push.onMessageReceived = function(payload) {
            console.log(payload);
            $('#model-order-info-body').html(payload.notification.body); 
            //$('#model-order-info-action').attr('href', payload.notification.click_action); 
            //$('#model-order-info-sound')[0].play();
            $('#modal-order-info').modal('show');
        };
});
</script>
</html>








