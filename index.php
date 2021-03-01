<?php

    $firstName = $lastName = $email = $dob = $homeAddress = $gender = "";
    $firstNameErr = $lastNameErr = $emailErr = $dobErr = $genderErr = "";

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        if(empty($_POST['firstName'])) {
            $firstNameErr = 'First Name Is Required!';
        } else {
            $firstName = $_POST['firstName'];
            $firstName = test_input($firstName);
        }
        
        if(empty($_POST['lastName'])) {
            $lastNameErr = 'Last Name Is Required!';
        } else {
            $lastName = $_POST['lastName'];
            $lastName = test_input($lastName);
        }

        if(empty($_POST['email'])) {
            $emailErr = "Email Is Required!";
        } else {
            $email = $_POST['email'];
            $email = test_input($email);
        }

        if(empty($_POST['homeAddress'])) {
            $homeAddress = "";
        } else {
            $homeAddress = $_POST['homeAddress'];
            $homeAddress = test_input($homeAddress);
        }

        if(empty($_POST['dob'])) {
            $dobErr = "Please Select Your Date of Birth!";
        } else {
            $dob = $_POST['dob'];
            $dob = test_input($dob);
        }

        if(empty($_POST['gender'])) {
            $genderErr = "Please Select Your Gender!";
        } else {
            $gender = $_POST['gender'];
            $gender = test_input($gender);
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>

    <style>
        body {
            height: 100vh;
            display: flex;
            /* justify-content: center; */
            align-items: center;
        }
        form {
            border: 2px solid black;
            width: 50%;
            height: 60%;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            padding: 40px 30px;
            border-radius: 5px;
        }
        .full-name {
            display: flex;
            justify-content: space-between;
        }
        .required {
            color: red;
        }
        .input-div {
            display: flex;
            flex-direction: column;
            width: 45%;
        }
        .error {
            color: red;
            font-weight: bold;
        }
        #register {
            height: 35px;
            cursor: pointer;
        }
        .reg-details {
            margin-left: 5%;
        }
    </style>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="full-name">
            <div class="input-div">
                <label for="firstName">First Name <span class="required">*Required</span></label>
                <input type="text" id="firstName" name="firstName" value="<?php if(!empty($_POST['firstName'])) {echo $_POST['firstName'];} ?>">
                <span class="error"><?php echo $firstNameErr; ?></span>
            </div>
            <div class="input-div">
                <label for="lastName">Last Name <span class="required">*Required</span></label>
                <input type="text" id="lastName" name="lastName" value="<?php if(!empty($_POST['lastName'])) {echo $_POST['lastName'];} ?>">
                <span class="error"><?php echo $lastNameErr; ?></span>
            </div>
        </div>
        <div class="input-div">
            <label for="dob">Date of Birth <span class="required">*Required</span></label>
            <input type="date" id="dob" name="dob" value="<?php if(!empty($_POST['dob'])) {echo $_POST['dob'];} ?>">
            <span class="error"><?php echo $dobErr; ?></span>
        </div>
        <div class="input-div">
            <label for="email">Email Address <span class="required">*Required</span></label>
            <input type="email" id="email" name="email" value="<?php if(!empty($_POST['email'])) {echo $_POST['email'];} ?>">
            <span class="error"><?php echo $emailErr; ?></span>
        </div>
        <div class="input-div">
            <label for="homeAddress">Home Address</label>
            <input type="text" id="homeAddress" name="homeAddress" value="<?php if(!empty($_POST['homeAddress'])) {echo $_POST['homeAddress'];} ?>">
        </div>
        <div class="gender">
            <span>Gender: <span class="required">*Required</span></span>
            <span class="error"><?php echo $genderErr; ?></span>
            <div class="gender-inputs">
                <div class="gender-div">
                    <label for="male">Male</label>
                    <input type="radio" id="male" name="gender" value="male" 
                        <?php if(isset($gender) && $gender == "male") {echo "checked";} ?>
                    >
                </div>
                <div class="gender-div">
                    <label for="female">Female</label>
                    <input type="radio" id="female" name="gender" value="female" 
                        <?php if(isset($gender) && $gender == "female") {echo "checked";} ?>
                    >
                </div>
                <div class="gender-div">
                    <label for="others">Others</label>
                    <input type="radio" id="others" name="gender" value="others" 
                        <?php if(isset($gender) && $gender == "others") {echo "checked";} ?>
                    >
                </div>
            </div>
        </div>
        <input type="submit" id="register" value="Register">
    </form>
    <div class="reg-details">
        <?php if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) && isset($_POST['dob']) && isset($_POST['gender'])) { ?>
            <h3>The Details You Entered Are As Follows</h3>
            <ul> 
                <li><?php echo $firstName; ?></li>
                <li><?php echo $lastName; ?></li>
                <li><?php echo $email; ?></li>
                <li><?php echo $dob; ?></li>
                <li><?php echo $gender; ?></li>
                <?php if($homeAddress != "") { ?>
                    <li><?php echo $homeAddress; ?></li>
                <?php } ?>
            </ul>
        <?php } ?>
    </div>
</body>
</html>