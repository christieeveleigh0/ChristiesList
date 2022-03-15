
console.log("Connected")

/* Toggle the eye icon to open and close when a user wants to 'Show Password'. This is used on the website's forms */
function toggleEye() {
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    
    togglePassword.addEventListener('click', function (e) {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        // Toggle the eye / eye slash icons by adding and removing a class
        this.classList.toggle('fa-eye-slash');
        this.classList.toggle('fa-eye'); 
    });
}