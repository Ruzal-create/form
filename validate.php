<!DOCTYPE html>  
<html>  
<head>  
    <link rel="stylesheet" href="site.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
</head>  
<body>  

    <?php
        $nameError = $emailError = $phoneError = $genderError = '';
        $name = $email = $phone = $gender = '';
        
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if(empty($_POST["name"])){
                $nameError = "Please enter a valid name";
            }
            else{
                $name = test_input($_POST["name"]);
                if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
                    $nameError = "Only alphabets and white space are allowed";  
                }  
            }

            if (empty($_POST["email"])) {  
                $emailError = "Email is required";  
            } else {  
            $email = test_input($_POST["email"]);  
            // check that the e-mail address is well-formed  
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                    $emailError = "Invalid email format";  
                }  
            }  

            if (empty($_POST["phone"])) {  
                $phoneError = "Mobile no is required";  
            } else {  
                $phone = test_input($_POST["phone"]);  
                // check if mobile no is well-formed  
                if (!preg_match ("/^[0-9]*$/", $phone) ) {  
                    $phoneError = "Only numeric value is allowed.";  
                }  
                //check mobile no length should not be less and greator than 10  
                if (strlen ($phone) != 10) {  
                    $phoneError = "Mobile no must contain 10 digits.";  
                }  
            }

            if (empty ($_POST["gender"])) {  
                $genderErr = "Gender is required";  
            } else {  
                $gender = test_input($_POST["gender"]);  
            } 
        }
        function test_input($data) {  
            $data = trim($data);  
            $data = stripslashes($data);  
            $data = htmlspecialchars($data);  
            return $data;  
        } 
    ?>

<h2>Registration Form</h2>  
<span class = "wrong">* required field </span>  
<br><br>  
<div class="form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >    
        <label for="name">Full Name:</label> 
        <input type="text" name="name" placeholder="Enter name">  
        <span class="wrong">* <?php echo $nameError; ?> </span>  
        <br><br>  
        <label for="email">Email:</label>   
        <input type="text" name="email" placeholder="Enter email">  
        <span class="wrong">* <?php echo $emailError; ?> </span>  
        <br><br>  
        <label for="phone">Phone:</label>     
        <input type="text" name="phone" placeholder="Enter phone number">  
        <span class="wrong">* <?php echo $phoneError; ?> </span>  
        <br><br>   
        <label for="gender">Gender:</label>   
        <input type="radio" name="gender" value="male"> Male  
        <input type="radio" name="gender" value="female"> Female  
        <input type="radio" name="gender" value="other"> Other  
        <span> <?php echo $genderError; ?> </span>  
        <br><br>     
        <input type="submit" value="submit">                         
    </form> 
</div>

</body>