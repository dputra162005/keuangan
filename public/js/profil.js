const btneditprofil = document.getElementById("btn-edit-profil");
const teksprofil = document.getElementById("teks-profil");
const texsprofil = document.getElementById("texs-profil");
const inputprofil = document.getElementById("input-profil");
const blogprofilinput = document.getElementById("blog-profil-input");
const inputprofilfoto = document.getElementById("input-profil-foto");
const btnokprofil = document.getElementById("btn-ok-profil");

btneditprofil.addEventListener("click" , function() {
    console.log("ppp");
    teksprofil.style.display = "none";
    texsprofil.style.display = "none";
    inputprofil.style.display = "block";
    blogprofilinput.style.display = "block";
    btneditprofil.style.display = "none";
    btnokprofil.style.display = "inline";
    inputprofilfoto.style.display= "block";

})