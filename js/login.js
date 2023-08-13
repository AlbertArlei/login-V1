function passwordEye() {
    const loginPasswordEye = document.getElementById('loginPassword-eye');
    const loginPasswordEyeOff = document.getElementById('loginPassword-eyeOff');
    const createPasswordEye = document.getElementById('createPassword-eye');
    const createPasswordEyeOff = document.getElementById('createPassword-eyeOff');
    const createConfirmPasswordEye = document.getElementById('createConfirmPassword-eye');
    const createConfirmPasswordEyeOff = document.getElementById('createConfirmPassword-eyeOff');
    const createPassword = document.getElementById('createUser-password');
    const loginPassword = document.getElementById('loginUser-password');
    const createConfirmPassword = document.getElementById('createUser-confirmPassword');

    createPasswordEye.addEventListener('click', () => {
        createPassword.setAttribute('type', 'text');
        createPasswordEye.style.display = 'none';
        createPasswordEyeOff.style.display = 'block';
    });

    createPasswordEyeOff.addEventListener('click', () => {
        createPassword.setAttribute('type', 'password');
        createPasswordEyeOff.style.display = 'none';
        createPasswordEye.style.display = 'block';
    });

    createConfirmPasswordEye.addEventListener('click', () => {
        createConfirmPassword.setAttribute('type', 'text');
        createConfirmPasswordEye.style.display = 'none';
        createConfirmPasswordEyeOff.style.display = 'block';
    });

    createConfirmPasswordEyeOff.addEventListener('click', () => {
        createConfirmPassword.setAttribute('type', 'password');
        createConfirmPasswordEye.style.display = 'block';
        createConfirmPasswordEyeOff.style.display = 'none';
    });

    loginPasswordEye.addEventListener('click', ()=>{
        loginPassword.setAttribute('type', 'text');
        loginPasswordEye.style.display = 'none';
        loginPasswordEyeOff.style.display = 'block';
    });

    loginPasswordEyeOff.addEventListener('click', ()=>{
        loginPassword.setAttribute('type', 'password');
        loginPasswordEye.style.display = 'block';
        loginPasswordEyeOff.style.display = 'none';
    });
}

function forms(){
    const createForm = document.getElementById('create-form');
    const loginForm = document.getElementById('login-form');
    const createUser = document.getElementById('create-user');
    const loginUser = document.getElementById('login-user');

    loginForm.addEventListener('click', ()=>{
        loginUser.style.display = 'flex';
        createUser.style.display = 'none';
    });

    createForm.addEventListener('click', ()=>{
        loginUser.style.display = 'none';
        createUser.style.display = 'flex';
    });
}

passwordEye();
forms();