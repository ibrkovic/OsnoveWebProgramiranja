function changeText() {
    document.querySelector('#naslov').innerHTML = 'Dobrodošli u našu knjižaru!';
}

function addBook() {
    const novaKnjiga = document.querySelector('#novaKnjiga').value;
    if (novaKnjiga) {
        const noviElement = document.createElement('li');
        noviElement.textContent = novaKnjiga;
        document.querySelector('#listaKnjiga').appendChild(noviElement);
        document.querySelector('#novaKnjiga').value = '';
    }
}

function changeStyle() {
    const naslovEl = document.querySelector('#naslov');
    naslovEl.style.color = 'purple';
    naslovEl.style.fontSize = '50px';
}

function printEmail() {
    const ispisEl = document.querySelector('#ispisEmaila');
    ispisEl.innerHTML = document.querySelector('#email').value;
}

document.addEventListener('DOMContentLoaded', function() {
    const buttonEl = document.querySelector('#changeButtonsStyle');
    buttonEl.addEventListener('click', function() {
        const buttons = document.querySelectorAll('button');
        buttons.forEach(button => {
            button.style.border = '2px';
            button.style.background = '#2b5c7a';
            button.style.color = '#fff';
            button.style.padding = '10px 15px';
        });
    });
});
