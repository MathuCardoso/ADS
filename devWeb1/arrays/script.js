let flags = [
  "assets/br-flag.gif",
  "assets/ar-flag.gif",
  "assets/au-flag.gif",
  "assets/aj-flag.gif",
  "assets/bl-flag.gif",
  "assets/mn-flag.gif",
  "assets/gm-flag.gif",
  "assets/sp-flag.gif",
  "assets/uk-flag.gif",
  "assets/us-flag.gif"
];

let img = document.getElementById("img");
let nxtBtn = document.getElementById("nxtBtn");
let prvBtn = document.getElementById("prvBtn");
let nFlags = document.getElementById("nFlags");
let i = 0;

function nxtFlag() {
  i++;

  img.src = flags[i];

  if (i == flags.length) {
    i = 0;
    img.src = flags[i];
  }

  nFlags.textContent = i + 1 + "/" + flags.length;
}

function prvFlag() {
  i--;

  img.src = flags[i];

  if (i == -1) {
    i = flags.length - 1;
    img.src = flags[i];
  }

  nFlags.textContent = i + 1 + "/" + flags.length;
}