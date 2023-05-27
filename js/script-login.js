var container = document.querySelector('.form');
var signUpButton = document.querySelector('.signUp');
var signInButton = document.querySelector('.signIn');

signUpButton.addEventListener('click', () => {
    container.classList.add('right-panel-active');
});

signInButton.addEventListener('click', () => {
    container.classList.remove('right-panel-active');
});
