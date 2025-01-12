// Form toggle functionality
const logregBox = document.querySelector('.logreg-box');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');

// Show Register Form
registerLink.addEventListener('click', () => {
    logregBox.classList.add('active');
});

// Show Login Form
loginLink.addEventListener('click', () => {
    logregBox.classList.remove('active');
});

// Function to show loading state
const setLoadingState = (button, isLoading) => {
    if (isLoading) {
        button.disabled = true;
        button.innerHTML = "Loading...";
    } else {
        button.disabled = false;
        button.innerHTML = "Login";
    }
};
