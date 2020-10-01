<!DOCtype html>
<html>
<head>
    <title>test</title>
    <link rel="manifest" href="https://ahmed-taha.arabsdesign.com/manifest.json">
</head>
<body>


<script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-messaging.js"></script>

<script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-firestore.js"></script>



<script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
        apiKey: "AIzaSyDMoROdr136Xb7SbR7wkpZWtVsq3ixeAG8",
        authDomain: "dashboard-e1277.firebaseapp.com",
        databaseURL: "https://dashboard-e1277.firebaseio.com",
        projectId: "dashboard-e1277",
        storageBucket: "dashboard-e1277.appspot.com",
        messagingSenderId: "1040978938175",
        appId: "1:1040978938175:web:fb53515b9ca851f02a6b8a",
        measurementId: "G-RBFMGHRFNH"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    Notification.requestPermission().then((permission) => {
        if (permission === 'granted') {
            console.log('Notification permission granted.');
        } else {
            console.log('Unable to get permission to notify.');
        }
    });


    const messaging       = firebase.messaging();
    messaging.onMessage((payload) => {
        console.log('Message received. ', payload);
    });


    messaging.getToken().then((currentToken) => {
        if (currentToken) {
            console.log(currentToken);
            localStorage.setItem('device_id', currentToken);
        } else {
            console.log('No Instance ID token available. Request permission to generate one.');
        }
    }).catch((err) => {
        console.log('An error occurred while retrieving token. ', err);
    });
</script>
</body>






</html>