const notify = document.getElementById('notification-container');

function createUserForm() {
    const username = document.getElementById('createUser-name');
    const email = document.getElementById('createUser-email');
    const password = document.getElementById('createUser-password');
    const confirmPassword = document.getElementById('createUser-confirmPassword');

    async function createUser() {
        const form = {};
        form.username = username.value;
        form.email = email.value;
        form.password = password.value;
        form.confirmPassword = confirmPassword.value;
        const response = await fetch('./php/createUser.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(form)
        });
        const responseData = await response.json();
        if (response.status === 200) {
            location.reload();
        } else {
            notify.innerHTML = `<span>${responseData.message}</span>`;
            notify.style.display = 'flex';
            notify.style.backgroundColor = 'rgb(97, 30, 30)';
        }


    }

    function validateForm() {
        function validateName() {
            notify.innerHTML = '';
            notify.style = '';
            if (username.value.length <= 5 & username.value.length > 0) {
                notify.innerHTML = '<span>Your username is short</span>';
                notify.style.display = 'flex';
                return;
            } else if (username.value.length === 0) {
                notify.innerHTML = '<span>Enter a username</span>';
                notify.style.display = 'flex';
                return;
            } else {
                notify.innerHTML = '';
                notify.style = '';
                return true;
            }

        }

        function validateEmail() {
            const regex = /^(?=.*@).{15,}$/.test(email.value);
            if (!regex) {
                notify.innerHTML = '<span>Invalid e-mail</span>';
                notify.style.display = 'flex';
                return;
            } else {
                notify.innerHTML = '';
                notify.style = '';
                return true;
            }
        }

        function validatePassword() {

            const regex = /^(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~`'"\-]).*(?=.*[A-Z]).*(?=.*[0-9]).{8,}$/.test(password.value);
            if (!regex) {
                notify.innerHTML = '<span>Invalid password</span>';
                notify.style.display = 'flex';
                return;
            } else {
                notify.innerHTML = '';
                notify.style = '';
                return true;
            }

        }

        function validateConfirmPassword() {
            if (password.value === confirmPassword.value) {
                notify.innerHTML = '';
                notify.style = '';

                return true;
            } else {
                notify.innerHTML = '<span>The passwords are not the same</span>';
                notify.style.display = 'flex';
                return;
            }

        }

        username.addEventListener('keyup', validateName);
        email.addEventListener('keyup', validateEmail);
        password.addEventListener('keyup', validatePassword);
        confirmPassword.addEventListener('keyup', validateConfirmPassword);


        document.getElementById('createUser-btn').addEventListener('click', (e) => {
            e.preventDefault();

            const isNameValid = validateName();
            const isEmailValid = validateEmail();
            const isPasswordValid = validatePassword();
            const isConfirmPasswordValid = validateConfirmPassword();

            if (isNameValid && isEmailValid && isPasswordValid && isConfirmPasswordValid) {
                createUser();
            } else {
                notify.innerHTML = 'fill the form';
                notify.style.display = 'flex';
            }
        });
    }



    validateForm();
}
createUserForm();