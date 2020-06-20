function FirebasePush(onTokenReceived) {
    var $this = this;

    var config = {
        apiKey: "API_KEY",
        authDomain: "AUTH_DOMAIN",
        databaseURL: "DATABASE_URL",
        projectId: "PROJECT_ID",
        storageBucket: "STORAGE_BUCKET",
        messagingSenderId: "MESSAGING_SENDER_ID",
        serviceWorkerPath: 'SERVICE_WORK_FILE_PATH' //./service-worker.js
        //appId: "APP_ID",// NOT REQUIRED
        // measurementId: "MEASUREMENT_ID" // NOT REQUIRED
    };

    var messaging = {};

    function initializeApp() {
        firebase.initializeApp(config);
        messaging = firebase.messaging();
        initServiceWorker();
    }

    function initServiceWorker() {
        navigator.serviceWorker.register(config.serviceWorkerPath).then((registration) => {
            messaging.useServiceWorker(registration);
            messaging.requestPermission().then(function() {
                console.log('Notification permission granted.');
                return messaging.getToken();
            }).then(function(token) {
                if (onTokenReceived) {
                    onTokenReceived(token);
                }
                delegateEvents();
            }).catch(function(err) {
                console.log('Error ocurred');
            });
        });
    }

    function delegateEvents() {

        // Whenever a token refreshed from FCM
        messaging.onTokenRefresh(function() {
            messaging.getToken()
                .then(function(refreshedToken) {
                    if ($this.onTokenRefreshed) {
                        $this.onTokenRefreshed(refreshedToken);
                    }
                })
                .catch(function(err) {
                    console.log('Unable to retrieve refreshed token ', err);
                });
        });

        // Whenever a message received from FCM
        messaging.onMessage(function(payload) {
            if ($this.onMessageReceived) {
                $this.onMessageReceived(payload);
            }
        });
    }

    initializeApp();
    return $this;
}
