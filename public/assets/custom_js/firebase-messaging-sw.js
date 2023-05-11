 // Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');
/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
*/
firebase.initializeApp({
   apiKey: "AIzaSyCwHyKQQCmmaO1Pz1cK3u5w3um_MAE-7rE",
    authDomain: "laravel-ecommerce-62f68.firebaseapp.com",
    projectId: "laravel-ecommerce-62f68",
    storageBucket: "laravel-ecommerce-62f68.appspot.com",
    messagingSenderId: "957103300821",
    appId: "1:957103300821:web:61fac083067436b383825c",
    measurementId: "G-XKHLQ4F8M0",
});

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function (payload) {
    console.log("Message received.", payload);
    const title = "Hello world is awesome";
    const options = {
        body: "Your notificaiton message .",
        icon: "/firebase-logo.png",
    };
    return self.registration.showNotification(
        title,
        options,
    );
});