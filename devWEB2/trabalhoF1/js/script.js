function logoPreview() {
  const logoPreview = document.getElementById("imgLogo");
  const inpLogo = document.getElementById("logoInp");

  inpLogo.click();

  inpLogo.addEventListener("change", () => {
    console.log(inpLogo);
    if (inpLogo.files.length <= 0) {
      return;
    }
    const file = inpLogo.files[0];

    let reader = new FileReader();

    reader.onload = (e) => {
      logoPreview.src = reader.result;
      logoPreview.removeAttribute("hidden");
      document.getElementsByClassName("logo-preview")[0].style.display = "flex";
    };

    reader.readAsDataURL(file);
  });
}

function carroPreview() {
  const carroPreview = document.getElementById("imgCarro");
  const inpCarro = document.getElementById("carroFile");

  inpCarro.click();

  inpCarro.addEventListener("change", () => {
    console.log(inpCarro);
    if (inpCarro.files.length <= 0) {
      return;
    }
    const file = inpCarro.files[0];

    let reader = new FileReader();

    reader.onload = (e) => {
      carroPreview.src = reader.result;
      carroPreview.removeAttribute("hidden");
      document.getElementsByClassName("carro-preview")[0].style.display =
        "flex";
    };

    reader.readAsDataURL(file);
  });
}
