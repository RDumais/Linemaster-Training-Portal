<?php
/**
 * File Name: signOut.php
 * Created by PhpStorm
 * User: ryand
 * Date: 8/6/2018
 * Time: 12:17 PM
 * Company: Linemaster Switch Corporation
 */

//Kills the visitor's session and any saved variable data
session_name("EmployeeOnboardingPortal");
session_start();
session_unset();
session_destroy();
session_write_close();
setcookie(session_name(),'',0,'/');
session_regenerate_id(true);

//Navigate back to the landing page
header('Location: ../index.php');
exit();