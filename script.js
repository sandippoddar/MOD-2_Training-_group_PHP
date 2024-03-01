// storing HTML elements 
const first_name = document.querySelector("#first_name");
const last_name = document.querySelector("#last_name");
let full_name = document.querySelector("#full_name");
full_name.value = "";

let regex = /^[a-zA-Z]+$/;
first_name.addEventListener('input',()=> {
    if (first_name.value==="") {
        document.querySelector(".wrong_fname").textContent = "";
    }
    else if (!regex.test(first_name.value)) {
        document.querySelector(".wrong_fname").textContent = "Enter Only Alphabets";
    }
    else {
        document.querySelector(".wrong_fname").extContent = "";
    }
})
last_name.addEventListener('input',()=> {
    if (last_name.value===""){
        document.querySelector(".wrong_lname").textContent = "";
    }
    else if (!regex.test(last_name.value)) {
        document.querySelector(".wrong_lname").textContent="Enter Only Alphabets";
    }
    else {
        document.querySelector(".wrong_lname").textContent = "";
    }
})
// function for update the full_name field
function update_value() {
    const first_name1 = first_name.value.replace(/[^a-zA-Z]/g, '');
    const last_name1 = last_name.value.replace(/[^a-zA-Z]/g, '');
    if (regex.test(first_name1)) {
        if (regex.test(last_name1)) {
            full_name.value = first_name1 + " " + last_name1;
        }
        else {
            full_name.value = first_name1 + " ";
        }
    }
    else {
        if (regex.test(last_name1)) {
            full_name.value = " " + last_name1;
        }
        else {
            full_name.value = "";
        }
    }
}
first_name.addEventListener('input', update_value);
last_name.addEventListener('input', update_value);
