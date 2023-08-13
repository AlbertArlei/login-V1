function loginUserForm() {
    const email = document.getElementById('loginUser-email');
    const password = document.getElementById('loginUser-password');

    async function loginProcess() {
        const form = {};
        form.email = email.value;
        form.password = password.value;
        const response = await fetch('./php/loginProcess.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(form)
        });
        if (response.status === 200) {
            window.location.href = './php/panel.php';
        } else {
            notify.innerHTML = '<span>Usuario ou senha incorretos</span>';
            notify.style.display = 'flex';
            notify.style.backgroundColor = 'rgb(97, 30, 30)';
        }
    }

    function formValidate() {
        if (email.value.length >= 13 && password.value.length >= 8) loginProcess();
    }

    document.getElementById('loginUser-btn').addEventListener('click', (e) => {
        e.preventDefault();
        formValidate();
    });
}
loginUserForm();
