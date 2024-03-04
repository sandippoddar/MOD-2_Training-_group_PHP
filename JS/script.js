// Storing HTML elements. 

const first_name = document.querySelector("#first_name");
const last_name = document.querySelector("#last_name");
let full_name = document.querySelector("#full_name");
let regex = /^[a-zA-Z]+$/;

/* Function for showing Error message while user enter any wrong input. */

function showError(Name,class_name) {
    if (Name === "") {
        document.querySelector('.' + class_name).textContent = "";
    }
    else if (!regex.test(Name)) {
        document.querySelector('.' + class_name).textContent = "Enter Only Alphabets";
    }
    else {
        document.querySelector('.' + class_name).textContent = "";
    }
}

first_name.addEventListener('input', () => {
    showError(first_name.value,'wrong_fname');
});
last_name.addEventListener('input', () => {
    showError(last_name.value,'wrong_lname');
});

/* Function for update the full_name field. */

function updateValue() {
    let regex_1 = /[^a-zA-Z]/g;
    const first_name1 = first_name.value.replace(regex_1, '');
    const last_name1 = last_name.value.replace(regex_1, '');
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
first_name.addEventListener('input', updateValue);
last_name.addEventListener('input', updateValue);
