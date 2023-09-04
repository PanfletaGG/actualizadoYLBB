import { auth } from '../../libs/firebase.init.js';
import { onAuthStateChanged  } from 'https://www.gstatic.com/firebasejs/10.1.0/firebase-auth.js'

const signUpBtn = document.getElementById('signup-btn')
const signInBtn = document.getElementById('login-btn')
const carrito = document.getElementById('carrito')
const home = document.getElementById('home')
const logo = document.getElementById('logo')




window.addEventListener('DOMContentLoaded', () => {
    onAuthStateChanged(auth, (user) => {
        if (user) {
            console.log(user);
            //implement logo

            logo.setAttribute('href', 'main.php')
            //implement link main
            let node3 = home.lastElementChild;
            home.removeChild(node3);

            let homeLink = document.createElement('a');
            homeLink.textContent = "Main";
            homeLink.setAttribute('href', 'main.php');
            homeLink.setAttribute('class', 'nav-link');

            home.appendChild(homeLink);
            //implement profile picture
            let node = signInBtn.lastElementChild;
            signInBtn.removeChild(node);

            let profileImage = document.createElement('img');
            profileImage.setAttribute('src', user.photoURL);
            profileImage.style.width = "38px";
            profileImage.style.marginTop = "4px";
            profileImage.style.borderRadius = "50%";


            signInBtn.appendChild(profileImage);

            //implement username
            
            let node2 = signUpBtn.lastElementChild;
            signUpBtn.removeChild(node2);

            let nameContent = document.createElement('p');
            nameContent.textContent = userName;
            nameContent.setAttribute('class', 'nav-link d-inline');

            signUpBtn.appendChild(nameContent);

            //implement shopping cart or add publish

            if (role == 'seller') {
                let node3 = carrito.lastElementChild;
                carrito.removeChild(node3);

                let addPublish = document.createElement('a');
                addPublish.textContent = 'add';
                addPublish.setAttribute('class', 'add-button d-inline');

                signUpBtn.appendChild(addPublish);
            }

        }else{
            console.log("Not logged");
        }
    })
})

