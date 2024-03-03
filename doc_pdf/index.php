<!DOCTYPE html>
<html>
<head>
    <title>Form Example</title>
    <link rel = "stylesheet" href = "./CSS/style.css">
</head>
<body>
    <div class = "container">
        <form method = "post" action = "pdf.php" enctype = "multipart/form-data">
            <h1>PHP BASIC</h1>
            <div class = "form-ele">
                <label for = "first_name">First Name:*</label>
                <input type = "text" name = "first_name" id = "first_name" maxlength = "20" pattern = "[A-Za-z]+" required>
                <p class = "wrong_fname"></p>
            </div>

            <div class = "form-ele">
                <label for = "last_name">Last name:*</label>
                <input type = "text" name = "last_name" id = "last_name" maxlength = "20" pattern = "[A-Za-z]+" required>
                <p class = "wrong_lname"></p>
            </div>

            <div class = "form-ele">
                <label for = "full_name"> Full Name: </label>
                <input type = "text" name = "full_name" id = "full_name" value = "" disabled>
            </div>

            <div class = "form-ele">
                <label for = "image">Enter Image</label>
                <input type = "file" name = "image" id = "image">
            </div>

            <div class = "form-ele">
                <label for = "phone">Enter Phone No. (+91)</label>
                 <input type = "text" name = "phone" id="phone" maxlength="13">
            </div>

            <div class = "form-ele">
                <label for = "email">Enter User Email:</label>
                <input type = "text" name = "email" id="email">
            </div>

            <div class = "form-ele">
                <label for = "table">Enter Marks (Subject|Marks):</label>
                <textarea name = "table" id = "table" cols = "30" rows = "5"></textarea>
            </div>
            
            <div class = "form-ele btn">
                <input type = "submit" name = "submit" value = "Submit">
            </div>
        </form>
    </div>
    <script src = "./JS/script.js"></script>
</body>
</html>
