// Import the functions you need from the SDKs you need
import { initializeApp } from 'https://www.gstatic.com/firebasejs/10.1.0/firebase-app.js'
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

import { getAuth } from 'https://www.gstatic.com/firebasejs/10.1.0/firebase-auth.js'


// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyDCJAFzDW41koEVxxd8xqlykIbrbc-GS8Q",
  authDomain: "ylbb-bd03c.firebaseapp.com",
  projectId: "ylbb-bd03c",
  storageBucket: "ylbb-bd03c.appspot.com",
  messagingSenderId: "661198870237",
  appId: "1:661198870237:web:d56469ef78821fc29ded34"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
export const auth = getAuth(app);
