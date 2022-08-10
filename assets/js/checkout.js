const creditCard = document.querySelector("#opt1");
const paypal = document.querySelector("#opt2");
const credits = document.querySelector("#opt3");

const x = document.querySelector("#creditCard");
const y = document.querySelector("#paypal");
const z = document.querySelector("#credits");
const a = document.querySelector("#info_box");

var execute_donate_page = document.querySelector("#execute_donate_page");
var donate_page = document.querySelector("#donate_page");
var col_donate_page = document.querySelector("#col_donate_page");
var txt_uk = document.querySelector(".subtitle");
var up = document.querySelector("#up");
var down = document.querySelector("#down");
var vox = document.querySelector("#vox");

vox.classList.add("col-md-12");

execute_donate_page.addEventListener("click", () => {
  if (donate_page.style.display == "block") {
    donate_page.style.display = "none";
    down.style.display = "block";
    up.style.display = "none";
  } else {
    donate_page.style.display = "block";
    down.style.display = "none";
    up.style.display = "block";
  }
});

x.style.display = "none";
y.style.display = "none";
z.style.display = "none";
a.style.display = "none";

function functionalRadioBtn() {
  creditCard.addEventListener("click", () => {
    if ((creditCard.checked = true)) {
      x.style.display = "block";
      z.style.display = "none";
      y.style.display = "none";
      a.style.display = "block";
      txt_uk.style.textAlign = "center";
      vox.classList.add("col-md-6");
      vox.classList.remove("col-md-12");
    }
  });

  paypal.addEventListener("click", () => {
    if ((paypal.checked = true)) {
      a.style.display = "none";
      x.style.display = "none";
      z.style.display = "none";
      y.style.display = "block";
      txt_uk.style.textAlign = "initial";
      vox.classList.add("col-md-12");
    }
  });

  credits.addEventListener("click", () => {
    if ((credits.checked = true)) {
      a.style.display = "none";
      x.style.display = "none";
      y.style.display = "none";
      z.style.display = "block";
      txt_uk.style.textAlign = "initial";
      vox.classList.add("col-md-12");
    }
  });
}

function success() {
  console.log("transaction successfully");
}

functionalRadioBtn();
