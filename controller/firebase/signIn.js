import { auth } from '../../libs/firebase.init.js';
import { GoogleAuthProvider,signInWithPopup,onAuthStateChanged  } from 'https://www.gstatic.com/firebasejs/10.1.0/firebase-auth.js'

//Boton que dispara el inicio de sesion con Google
const btnSignIn = document.getElementById('btn-google')


//--------------------------------------------------
//--------------------------------------------------

// Funcionalidad de sign in with google

//--------------------------------------------------
//--------------------------------------------------

const signIn = async () => {
    let provider = new GoogleAuthProvider();
    
    const signInWithGoogle = async (provider) => {
        let res = await signInWithPopup(auth, provider)
        return res;
    }
    let result = await signInWithGoogle(provider);   
    if(result?.user){
        location.href = "modal-role.php";
    }
}

btnSignIn.addEventListener('click', () => {
    signIn()
})


//--------------------------------------------------
//--------------------------------------------------

// Funcionalidad de autenticacion de usuario logeado.

//--------------------------------------------------
//--------------------------------------------------

/* window.addEventListener('DOMContentLoaded', () => {
    onAuthStateChanged(auth, (user) => {
        if (user) {
            
                location.href = "modal-role.php";
        }else{
            console.log("Not logged");
        }
    })
}) */


