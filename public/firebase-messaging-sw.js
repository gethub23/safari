// importScripts('https://www.gstatic.com/firebasejs/4.9.1/firebase.js');

importScripts("https://www.gstatic.com/firebasejs/7.6.1/firebase-app.js");
importScripts("https://www.gstatic.com/firebasejs/7.6.1/firebase-messaging.js");
importScripts("https://www.gstatic.com/firebasejs/7.6.1/firebase-analytics.js");
importScripts("https://www.gstatic.com/firebasejs/7.6.1/firebase-auth.js");
importScripts("https://www.gstatic.com/firebasejs/7.6.1/firebase-firestore.js");

// Initialize Firebase
firebase.initializeApp({
    apiKey: "AIzaSyDMoROdr136Xb7SbR7wkpZWtVsq3ixeAG8",
    authDomain: "dashboard-e1277.firebaseapp.com",
    databaseURL: "https://dashboard-e1277.firebaseio.com",
    projectId: "dashboard-e1277",
    storageBucket: "dashboard-e1277.appspot.com",
    messagingSenderId: "1040978938175",
    appId: "1:1040978938175:web:fb53515b9ca851f02a6b8a",
    measurementId: "G-RBFMGHRFNH"
});

const messaging = firebase.messaging();

messaging.setBackgroundMessageHandler(function(payload) {
    console.log('[firebase-messaging-sw.js] Received background message ', payload);
    // Customize notification here
    const notificationTitle = payload.notification.title;
    const notificationOptions = {
        title: payload.notification.title,
        body: payload.notification.body,
        icon: payload.notification.icon
    };

    return self.registration.showNotification(notificationTitle,
        notificationOptions);
});

