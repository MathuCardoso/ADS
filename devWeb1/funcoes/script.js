function mudarCor(cor) {
    document.getElementById('ex1').style.backgroundColor = cor;
}

function toUpper(text) {
    let upper = document.getElementById('upper');
    upper.value = text;
}

function bgP(color) {

    if(color == "red") {
        document.getElementById('p1').style.backgroundColor = "red";
    } else if(color == "blue") {
        document.getElementById('p2').style.backgroundColor = "blue";
    } else if(color == "yellow") {
        document.getElementById('p3').style.backgroundColor = "yellow";
    } else if(color == "green") {
        document.getElementById('p4').style.backgroundColor = "green";
    } else {
        document.getElementById('p1').style.backgroundColor = "white";
        document.getElementById('p2').style.backgroundColor = "white";
        document.getElementById('p3').style.backgroundColor = "white";
        document.getElementById('p4').style.backgroundColor = "white";
    }
}


function calcOrc() {
    let valor = document.getElementById('valor').value;
    let quantidade = document.getElementById('quantidade').value;
    document.getElementById('result').textContent = "R$ " + (valor * quantidade).toFixed(2);
}


function calcOrc2(id) {
    let valor = document.getElementById('valor' + id).value;
    let quantidade = document.getElementById('quantidade' + id).value;
    document.getElementById('resultado' + id).textContent = (valor * quantidade).toFixed(2);
}

function calcTotal() {
    let r2 = Number(document.getElementById('resultado2').textContent);
    let r3 = Number(document.getElementById('resultado3').textContent);
    let r4 = Number(document.getElementById('resultado4').textContent);

    vTotal = Number(r2 + r3 + r4);

    document.getElementById('valorTotal').textContent = "R$ " + vTotal.toFixed(2);
}