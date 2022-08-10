const mail = document.querySelector("#mail");
const editMail = document.querySelector("#edit");
const btnMail = document.querySelector("#btnedit");

const editWebsite = document.querySelector("#editWebsite");
const btnEditWebsite = document.querySelector("#btnEditWebsite");
const website = document.querySelector("#website");

btnMail.addEventListener("mouseenter", () => {
  mail.style.display = "none";
  editMail.style.display = "block";
  console.log("success");
});

btnMail.addEventListener("mouseleave", () => {
  mail.style.display = "inline-block";
  editMail.style.display = "none";
  console.log("success");

});

btnEditWebsite.addEventListener("mouseenter", () =>{

website.style.display ="none";
editWebsite.style.display = "block";
console.log("success");

});


btnEditWebsite.addEventListener("mouseleave", () =>{
    website.style.display ="inline-block";
    editWebsite.style.display = "none";
    console.log("success");

});

btnEditWebsite.addEventListener("click", () =>{

modalWebsite.addEventListener("");

});