<?php
/**
 * File Name: submitSignIn.php
 * Created by PhpStorm
 * User: ryand
 * Date: 8/6/2018
 * Time: 12:13 PM
 * Company: Linemaster Switch Corporation
 */

//Start the session for the visitor
session_name("EmployeeOnboardingPortal");
session_start();

//If any errors arise display them
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Accessing an external file for database connection
require('../../../php/connect.php');


$setsite = 'DECLARE @SiteName SiteType
          , @Infobar  InfobarType;
            SELECT @SiteName = [site].[site]
            FROM [dbo].[site]
            WHERE [site].[site] = \'LSC\';
            EXEC [dbo].[SetSiteSp] @Site = @SiteName, @Infobar = @Infobar OUTPUT;';

$_POST['empNum'] = $_SESSION['empNum'];
