<?php
/**
 * File Name: submitEmployee.php
 * Created by PhpStorm
 * User: ryand
 * Date: 8/7/2018
 * Time: 11:16 AM
 * Company: Linemaster Switch Corporation
 */


//Start the session for the visitor
session_start();

//If any errors arise display them
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$_SESSION['isSignedIn'] = TRUE;

header("Location: ../index.php"); /* Redirect browser */
/* Make sure that code below does not get executed when we redirect. */
exit;