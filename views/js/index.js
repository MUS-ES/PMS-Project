


let inputs = document.querySelectorAll(".input-field");
let sign_btn = document.querySelectorAll(".sign");/*we mention our anchor tag*/
/*both buttons are inside this variable to move both signin and signup forms when clicking*/
let main = document.querySelector("main");/*to give the element the signup mode class*/

inputs.forEach((inp) => {
  inp.addEventListener("focus", () => {
    inp.classList.add("active");
  });
inp.addEventListener("blur", () => {
  if (inp.value != "") return;
  inp.classList.remove("active");
});
});

sign_btn.forEach((btn) => { /*for each sign_btn we will take that btn and give it an addEventListener of click*/
  btn.addEventListener("click", () => {
    main.classList.toggle("sign-up-mode");/*means if we click on one of those toggle buttons for the first time
                                            it is gonna add the sign up mode class to the main element
                                            and again if we ckick we ckick again on one of the toggle buttons
                                            no matter if it is the same one we clicked before then
                                            it is gonna remove that sign up mode class*/
  });
});