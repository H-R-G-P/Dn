let closeButtons = document.getElementsByClassName('btn-close');

for (let i = 0; i < closeButtons.length; i++) {
    let btn = closeButtons[i];
    btn.addEventListener('click', (event) => {
        let alert = event.path[1];
        console.log(alert)
        alert.classList.remove('d-flex');
        alert.style.display = "none";
    });
}