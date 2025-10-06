let inp = document.querySelectorAll('.inpNota');
let mediaHtml = document.getElementById('media');
let conceito = document.getElementById('conceito');
let notaA = document.getElementById('notaA');
let notaB = document.getElementById('notaB');
let notaC = document.getElementById('notaC');
let notaD = document.getElementById('notaD');


inp.forEach(nota => {
    nota.addEventListener("input", () => {

    let soma = 0;
    inp.forEach(n => {
        soma+= Number(n.value);
    });

    let media = (soma / inp.length).toFixed(2);
    mediaHtml.textContent = media;

    if(media >= 9.0) {
        bgYellow('A');
        conceito.textContent = "A";
        conceito.style.color = "green";
    } else if(media >= 7.5 && media <= 8.9) {
        bgYellow('B');
        conceito.style.color = "blue";
        conceito.textContent = "B";
    } else if(media >= 6.0 && media <=7.4) {
        bgYellow('C');
        conceito.textContent = "C";
        conceito.style.color = "gray";
    } else {
        bgYellow('D');
        conceito.textContent = "D";
        conceito.style.color = "brown";
    }

    })
});

function bgYellow(conceito) {
    notaA.style.background = 'none';
    notaB.style.background = 'none';
    notaC.style.background = 'none';
    notaD.style.background = 'none';
    document.getElementById('nota' + conceito).style.backgroundColor = 'yellow';
    
}