document.querySelector('.div1 span').addEventListener('click', e => {
    const passwordInput = document.querySelector('#exampleInputPassword1');
    if (e.target.classList.contains('show')) {
        e.target.classList.remove('show');
        e.target.textContent = 'Ocultar';
        passwordInput.type = 'text';
    } else {
        e.target.classList.add('show');
        e.target.textContent = 'Mostrar';
        passwordInput.type = 'password';
    }
});