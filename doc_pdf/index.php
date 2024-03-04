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
                <label for = "firstName">First Name:*</label>
                <input type = "text" name = "firstName" id = "firstName" maxlength = "20" pattern = "[A-Za-z]+" required>
                <p class = "wrongFname"></p>
            </div>

            <div class = "form-ele">
                <label for = "lastName">Last name:*</label>
                <input type = "text" name = "lastName" id = "lastName" maxlength = "20" pattern = "[A-Za-z]+" required>
                <p class = "wrongLname"></p>
            </div>

            <div class = "form-ele">
                <label for = "fullName"> Full Name: </label>
                <input type = "text" name = "fullName" id = "fullName" value = "" disabled>
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
