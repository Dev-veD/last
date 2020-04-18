<?php
function isLoggedIn()
    {
        if(session_status()==PHP_SESSION_NONE)
        {
            session_start();
        }
        if(isset($_SESSION['user_id']))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

function adminLoggedIn()
{
    if(session_status()==PHP_SESSION_NONE)
        {
            session_start();
        }
        if(isset($_SESSION['user_admin'])&&($_SESSION['user_id']=='Admin'))
        {
            return true;
        }
        else
        {
            return false;
        }
}
?>