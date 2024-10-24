const form = document.getElementById('dynamicForm');
const nameInput = document.getElementById('name');
const emailInput = document.getElementById('email');
const messageInput = document.getElementById('message');
const successMessage = document.querySelector('.success-message');
const errorMessage = document.querySelector('.error-message');

// Simple validation rules
const inappropriateWords = ['ugly', 'stupid'];  // Contoh kata tidak pantas

form.addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent page reload

    let isValid = true;

    // Validate Name
    if (nameInput.value.length < 3) {
        nameInput.classList.add('is-invalid');
        isValid = false;
    } else {
        nameInput.classList.remove('is-invalid');
        nameInput.classList.add('is-valid');
    }

    // Validate Email
    if (!validateEmail(emailInput.value)) {
        emailInput.classList.add('is-invalid');
        isValid = false;
    } else {
        emailInput.classList.remove('is-invalid');
        emailInput.classList.add('is-valid');
    }

    const usernameInput = document.getElementById('username');
    const form = document.getElementById('usernameForm');

    // Real-time validation for username input
    usernameInput.addEventListener('input', function () {
        if (usernameInput.value.length >= 3) {
            usernameInput.classList.remove('is-invalid');
            usernameInput.classList.add('is-valid');
        } else {
            usernameInput.classList.remove('is-valid');
            usernameInput.classList.add('is-invalid');
        }
    });


    // Show success or error message based on validation
    if (isValid) {
        successMessage.style.display = 'block';
        errorMessage.style.display = 'none';
    } else {
        successMessage.style.display = 'none';
        errorMessage.style.display = 'block';
    }
});

// Helper function to validate email
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
}
