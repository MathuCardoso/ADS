let ex1 = document.getElementById('btn-ex1');
let ex2 = document.getElementById('btn-ex2');
let ex3 = document.getElementById('btn-ex3');
let ex4 = document.getElementById('btn-ex4');
let ex5 = document.getElementById('btn-ex5');
let ex6 = document.getElementById('btn-ex6');

function atv1() {
    let nome = prompt("Digite seu nome: ");
    let sobrenome = prompt("Digite seu sobrenome: ");

    alert(sobrenome + ' ' + nome);
}

function atv2() {
    let valor = prompt("Digite o valor de um produto: ");
    alert("Este é o valor do produto com 10% de desconto: " + (valor * 0.90) + "R$");
}

function atv3() {
    let bgColor = prompt("Informe uma cor a ser aplicada no background da página: ");
    document.body.style.backgroundColor = bgColor;
}

function atv4() {
    let media;

    let n1 = Number(prompt("Informe o 1º número: "));
    let n2 = Number(prompt("Informe o 2º número: "));
    let n3 = Number(prompt("Informe o 3º número: "));

    media = (n1 + n2 + n3) / 3;

    alert("Esta é a média dos números digitados: " + media);
}

function atv5() {
    let c = Number(prompt("Informe uma temperatura em Celsius: "));
    let f = Number((c * 1.8) + 32);

    alert(c + " graus Celsius em Fahrenheit é: " + f);
}

function atv6() {
    let modelo = Number(prompt("Digite o ano/modelo de fabricação do seu veículo:"));
    let valorCarro = Number(prompt("Agora digite o valor do seu veículo: "));
    let valorSeguro = 0;

    if(modelo > 2022) {

        valorSeguro = valorCarro * 0.05;

    } else if(modelo >= 2018 && modelo <= 2022) {

        valorSeguro = valorCarro *  0.10;

    } else {

        valorSeguro = valorCarro * 0.15;

    }

    alert("Este é o valor do seguro do seu carro: " + valorSeguro);
}

ex1.addEventListener('click', function() {
    atv1();
});

ex2.addEventListener('click', function() {
    atv2();
});

ex3.addEventListener('click', function() {
    atv3();
});

ex4.addEventListener('click', function() {
    atv4();
});

ex5.addEventListener('click', function() {
    atv5();
});

ex6.addEventListener('click', function() {
    atv6();
});
