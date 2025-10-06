function validar() {
  let titulo = document.querySelector("#titulo").value;
  let genero = document.querySelector("#genero").value;
  let autor = document.querySelector("#autor").value;
  let msgErro = document.querySelector("#msgErro");

  if (titulo.trim() == "") {
    msgErro.innerHTML = "Informe o título!";
    return false;
  } else if (autor.trim() == "") {
    msgErro.innerHTML = "Informe o autor!";
  } else if (genero.trim() == "") {
    msgErro.innerHTML = "Informe o genero!";
  }

  return false;
}
