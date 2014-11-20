<?php
include("_config.php");

$email = pget("email");

$sql = "SELECT * FROM users WHERE email = '$email'";
$res = $GLOBALS["db"]->query($sql);
if($res->num_rows !== 0) {
    while($row = $res->fetch_assoc()) {
        $result["username"] = $row["username"];
        $result["password"] = $row["password"]; /* MD5 anti hash */
    }
} else {
    $result = false;
}

if($result !== false) {
    $subject = "Retrieve user information";
    $message = "
        <h1>Hello ".$email."</h1>
        <p>You have requested your user information, and we are sending this to you on the behalf of this request</p>\n
        <p>If you did not make this request, either contact us or simply ignore this email</p>
        \n\n\n
        <h2>Your information is as follows:</h2>
        <ul>
            <li>
                Email: <strong>".$email."</strong>
            </li>
            <li>
                Username: <strong>".$result["username"]."</strong>
            </li>
            <li>
                Password: <strong>".$result["password"]."</strong>
            </li>
        </ul>
        \n\n
        Thank you for using our app, we hope you enjoy it!
        \n\n
        - Team Easteregg
    ";

    $header = "MIME-Version: 1.0" . "\r\n";
    $header .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
    $header .= "from:@robot@baademedia.dk";

    mail($email, $subject, $message, $header);
} else {
    echo "false";
}

