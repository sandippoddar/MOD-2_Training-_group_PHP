const first_name = document.querySelector("#first_name");
const last_name = document.querySelector("#last_name");
let full_name = document.querySelector("#full_name");
function update ()
{
    full_name.value = first_name.value+" "+last_name.value;
}
first_name.addEventListener('input', update);
last_name.addEventListener('input', update);
