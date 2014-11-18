<?php
include("_config.php");

/* Expect nothing */
$result["success"] = false;


/* Validate */
if(pget("email") && pget("username") && pget("password")) {
    $username = pget("username");
    $password = pget("password");
    $email = pget("email");

    $sqlTest = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";

    $resTest = $GLOBALS["db"]->query($sqlTest);

    if($resTest->num_rows == 0) {
        $createUser = "INSERT INTO users (email, username, password) VALUES ('$email','$username','$password')";
        $GLOBALS["db"]->query($createUser);
        $_userId = $GLOBALS["db"]->insert_id;

        $createUserInfo = "INSERT INTO userInfo (userId,profileImage,firstname,lastname) SELECT '$_userId', profileImage, firstname, lastname FROM userInfo WHERE id = 1";
        $GLOBALS["db"]->query($createUserInfo);

        $result["success"] = true;
    } else {
        $result["success"] = false;
    }
}
echo json_encode($result);