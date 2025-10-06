let n1 = document.getElementById("n1");
let n2 = document.getElementById("n2");
let msg = document.getElementById("msg");

n1.value = Math.floor(Math.random() * (100 - 1) + 1);
n2.value = Math.floor(Math.random() * (100 - 1) + 1);

let resultado = Number(n1.value) + Number(n2.value);

function atv1() {
  let resp = document.getElementById("resp").value;
  if (resp == resultado) {
    msg.textContent = "Parabéns!";
  } else {
    msg.textContent = "Errou! Tente novamente";
  }
}

function atv2() {
  let nome = document.getElementById("nome").value;
  let cpf = document.getElementById("cpf").value;
  let email = document.getElementById("email").value;
  let msgForm = document.getElementById("msgForm");

  if (nome.length < 3) {
    msgForm.textContent = "Erro no campo NOME";
    return false;
  }

  if (cpf.length < 11 || cpf.length > 11) {
    msgForm.textContent = "Erro no campo CPF";
    return false;
  }

  if (email.length < 4) {
    msgForm.textContent = "Erro no campo EMAIL";
    return false;
  }

  msgForm.textContent = "Tudo certo!";
}

let tarefas = document.getElementById("listTarefas");

function atv3() {
  let inpTarefa = document.getElementById("inpTarefa");
  let tarefa = document.createElement("li");

  if (inpTarefa.value != "") {
    tarefa.textContent = inpTarefa.value;
    tarefas.appendChild(tarefa);
    inpTarefa.value = null;
  }
}

function atv4Orc(id) {
  let valor = document.getElementById("valor" + id).value;
  let quantidade = document.getElementById("quantidade" + id).value;
  document.getElementById("resultado" + id).textContent = (
    valor * quantidade
  ).toFixed(2);
}

function atv4Total() {
  let r2 = Number(document.getElementById("resultado2").textContent);
  let r3 = Number(document.getElementById("resultado3").textContent);
  let r4 = Number(document.getElementById("resultado4").textContent);

  vTotal = Number(r2 + r3 + r4);

  document.getElementById("valorTotal").textContent = "R$ " + vTotal.toFixed(2);
}
