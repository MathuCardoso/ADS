document.addEventListener("DOMContentLoaded", () => {
  const inputFile = document.getElementById("inpFoto");
  const imgPreview = document.getElementById("imgPreview");
  const btnPreview = document.getElementById("selFoto");
  const loading = document.querySelector(".loading");

  btnPreview.addEventListener("click", () => {
    inputFile.click();
  });

  inputFile.addEventListener("change", () => {
    const reader = new FileReader();

    reader.readAsDataURL(inputFile.files[0]);

    reader.addEventListener("loadstart", () => {
      imgPreview.src = "";
    });

    reader.addEventListener("progress", () => {
      loading.style.display = "block";
    });

    reader.addEventListener("load", () => {
      setTimeout(() => {
        loading.style.display = "none";
        imgPreview.style.display = "block";
        imgPreview.src = reader.result;
        btnPreview.textContent = inputFile.files[0].name;
      }, 500);
    });
  });
});
