async function logout() {
    fetch('./logout.php', {
        method: 'POST'
    });

    location.reload();
}

function editUserForm(a) {
    const username = document.getElementById('editUser-name');
    const email = document.getElementById('editUser-email');
    if (a === 'editUser') {
        editUser();
    } else if (a === 'editUserPassword') {
        editUserPassword();
    }
    async function editUser() {
        const form = {};
        form.username = username.value;
        form.email = email.value;

        const response = await fetch('./editUser.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(form)
        });
        if (response.status === 200) {
            location.reload();
        } else {
            console.log(response.json())
        }
    }
    async function editUserPassword() {
        const currentPassword = document.getElementById('editUser-currentPassword');
        const newPassword = document.getElementById('editUser-newPassword');
        const form = {};
        form.currentPassword = currentPassword.value;
        form.newPassword = newPassword.value;
        const response = await fetch('./editUser.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(form)
        });
        if (response.status === 200) {
            location.reload();
        } else {
            console.log(await response.json())
        }
    }

}

document.getElementById('editUser-btn').addEventListener('click', (e) => {
    e.preventDefault();
    editUserForm('editUser');
});

document.getElementById('editUserPassword-btn').addEventListener('click', (e) => {
    e.preventDefault();
    editUserForm('editUserPassword');
});


document.getElementById('logout-btn').addEventListener('click', () => {
    logout();
});

function inputPasswordEye() {
    const editCurrentPasswordEye = document.getElementById('editCurrentPassword-eye');
    const editCurrentPasswordEyeOff = document.getElementById('editCurrentPassword-eyeOff');
    const editNewPasswordEye = document.getElementById('editNewPassword-eye');
    const editNewPasswordEyeOff = document.getElementById('editNewPassword-eyeOff');
    const editCurrentPasswordInput = document.getElementById('editUser-currentPassword');
    const editNewPasswordInput = document.getElementById('editUser-newPassword');

    editCurrentPasswordEye.addEventListener('click', () => {
        editCurrentPasswordInput.setAttribute('type', 'text');
        editCurrentPasswordEye.style.display = 'none';
        editCurrentPasswordEyeOff.style.display = 'flex';
    });

    editCurrentPasswordEyeOff.addEventListener('click', () => {
        editCurrentPasswordInput.setAttribute('type', 'password');
        editCurrentPasswordEye.style.display = 'flex';
        editCurrentPasswordEyeOff.style.display = 'none';
    });

    editNewPasswordEye.addEventListener('click', () => {
        editNewPasswordInput.setAttribute('type', 'text');
        editNewPasswordEye.style.display = 'none';
        editNewPasswordEyeOff.style.display = 'flex';
    });

    editNewPasswordEyeOff.addEventListener('click', () => {
        editNewPasswordInput.setAttribute('type', 'password');
        editNewPasswordEye.style.display = 'flex';
        editNewPasswordEyeOff.style.display = 'none';
    });

}

inputPasswordEye();