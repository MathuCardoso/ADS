document.addEventListener("DOMContentLoaded", () => {
  const url = "https://servicodados.ibge.gov.br/api/v1/paises/";
  const select = document.getElementById("inpNac");

  async function getPaises() {
    let paises = await fetch(url);
    paises = await paises.json();
    console.log(paises);

    paises.forEach((p) => {
      let option = document.createElement("option");
      option.textContent = p.nome.abreviado;
      select.appendChild(option);
    });
  }

  getPaises();
});
