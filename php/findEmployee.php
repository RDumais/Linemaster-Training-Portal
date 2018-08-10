<?php
/**
 * File Name: findEmployee.php
 * Created by PhpStorm
 * User: ryand
 * Date: 8/6/2018
 * Time: 9:34 AM
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


if (isset($_POST['empNum'])) {

    $_SESSION['empNum'] = $_POST['empNum'];

    //Gather previous records based on the phone number
    $findEmpNameSTMT = $setsite . "SELECT DISTINCT
                                   SUBSTRING(name, CHARINDEX(',', name) + 1, LEN(name) - CHARINDEX(',', name)) + ' '
                                   + SUBSTRING(name, 1, CHARINDEX(',', name) - 1) AS name
                                   FROM dbo.employee_mst
                                   WHERE term_date IS NULL AND emp_num LIKE '{$_POST['empNum']}'";

    //Execute query
    $findEmpNameEXEC = sqlsrv_query($conn, $findEmpNameSTMT);


    //If there is a previous record, display the name to the visitor for confirmation
    if (sqlsrv_has_rows($findEmpNameEXEC)) {
        while ($row = sqlsrv_fetch_array($findEmpNameEXEC)) {
            echo '<h4>Hi <span class="variableHolder">' . $row['name'] . '</span>!</h4>';
            $_SESSION['empName'] = $row['name'];
            $_SESSION['empFirstName'] = strtok($_SESSION['empName'], ' ');
        }
    }

}