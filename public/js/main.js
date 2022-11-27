const btnSubmit = document.querySelector('button[name="action"]'),
  inputUser = document.querySelector('input[name="user"]'),
  inputPass = document.querySelector('input[name="pass"]');
console.log(btnSubmit);
console.log(inputUser);
console.log(inputPass);
const campos = {};

function validarCampos(obj) {
  if (obj.inputUser === "" || obj.inputPass === "") {
    alertify.set("notifier", "position", "top-right");
    alertify.error("Todos los campos son requeridos");
    return false;
  } else {
    return true;
  }
}

btnSubmit.addEventListener("click", (e) => {
  e.preventDefault();
  campos.inputUser = inputUser.value;
  campos.inputPass = inputPass.value;
  let validar = validarCampos(campos);
  console.log(validar);
});



