<?php
if (isset($_POST["action"]) && $_POST["action"] == "is_email_exist")
{
    isEmailExist();
}


/* Check If User Is exist */
function isEmailExist()
{
   require_once "libraries/Database.php";
   require_once "config/config.php";

    $con = new Database;
    $email = $_POST["email"];
    $con->query("SELECT email FROM users WHERE email=:email");
    $con->bind(":email", $email);
    /* Count Number Of Row In Result  */
    if ($con->rowCount() > 0)
    { /* This Email Is Exist */
        echo "true";
    }
    else
    { /* This Email Not Exist */
        echo "false";
    }
}
