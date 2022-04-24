<?php
session_start();
function isLoggedIn()
{
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
    {
        return true;
    }
    return false;
}

function isAdminLoggedin()
{
    if (isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin'] == true)
    {
        return true;
    }
    return false;
}

function isActive()
{
    if (isLoggedIn())
    {
        $db = new Database();
        $db->query("SELECT active FROM users where id=:id");
        $db->bind(':id', $_SESSION['user_id']);
        if ($db->single()->active == 1)
        {
            return true;
        }
    }
    return false;
}
