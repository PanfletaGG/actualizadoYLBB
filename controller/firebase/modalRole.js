import { auth } from '../../libs/firebase.init.js';
import { onAuthStateChanged } from 'https://www.gstatic.com/firebasejs/10.1.0/firebase-auth.js'


window.addEventListener('DOMContentLoaded', () => {
    onAuthStateChanged(auth, async (user) => {
        if (user) {
            //Poner por defecto un correo en la ventana modal
            let emailInput = document.getElementById('emailInput');
            let email = user.email;
            emailInput.setAttribute('value', email)

            try {
                let response = await fetch("../controller/Role.php", {
                    method: "POST",
                    headers: {
                        "Content-type": "application/x-www-form-urlencoded"
                    },
                    body: "email=" + encodeURIComponent(email)
                });

                let data = await response.text();

                if (data.trim() === "exists") {
                  
                    window.location.href = "./main.php";
                  
                  } else {
                    
                    console.log("erro my man");
                }
            } catch (error) {
                console.error("Error:", error);
            }

        } else {
            console.log("Not logged");
        }
    })
})


