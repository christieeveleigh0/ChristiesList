
console.log("Connected")

// /* Toggle the eye icon to open and close when a user wants to 'Show Password'. This is used on the website's forms */
// function toggleEye() {
//     const togglePassword = document.querySelector('#togglePassword');
//     const password = document.querySelector('#password');
    
//     togglePassword.addEventListener('click', function (e) {
//         const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
//         password.setAttribute('type', type);

//         // Toggle the eye / eye slash icons by adding and removing a class
//         this.classList.toggle('fa-eye-slash');
//         this.classList.toggle('fa-eye'); 
//     });
// }

/**/
function showMenu() { 
    console.log("Why is this not working?")
    document.getElementById("teams-dropdown").classList.toggle("show");
}
 
/**/
window.onclick = function(event) {
    if (!event.target.matches('.ellipse')) {
        var dropdowns = document.getElementsByClassName("teams-dropdown");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) { openDropdown.classList.remove('show'); }
        }
    }
}

// function toastMessage() {
//     var toastDiv = document.getElementById("toast");
//     toastDiv.className = "show";
//     setTimeout(function(){ toastDiv.className = toastDiv.className.replace("show", ""); }, 4000);
// }