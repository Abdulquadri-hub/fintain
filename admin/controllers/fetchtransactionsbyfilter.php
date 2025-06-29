<?php

session_start();

header('Content-Type: application/json');

require_once $_SERVER['DOCUMENT_ROOT'] . "/utils/autoload.php";

if ($_SESSION['elfuseremail'] === null || !isset($_SESSION['elfuseremail'])) {
     exit(badRequest(204,'Invalid session data. Proceed to login'));
}

$email = (isset($_SESSION["selectedemail"]) && $_SESSION["selectedemail"] !== "") ? $_SESSION["selectedemail"] : $_SESSION['elfuseremail'];
$admin = new Administration();

$organisationid = (isset($_POST["organisationid"]) && $_POST["organisationid"] > 0) ? $_POST["organisationid"] : 0;
$channel = (isset($_POST["channel"]) && $_POST["channel"] !== "") ? $_POST["channel"] : "%";
$startdate = (isset($_POST["startdate"]) && $_POST["startdate"] !== "") ? $_POST["startdate"] : date('Y-m-d');
$enddate = (isset($_POST["enddate"]) && $_POST["enddate"] !== "") ? $_POST["enddate"] : date('Y-m-d');
$status = (isset($_POST["status"]) && $_POST["status"] !== "") ? $_POST["status"] : "POSTED";

$result = $admin->executeByQuerySelector("SELECT * FROM transactions WHERE organisationid = $organisationid AND channel LIKE '$channel' AND credit > 0 AND status LIKE '$status' AND DATE(transactiondate) BETWEEN '$startdate' AND '$enddate'");
if($result){
	echo success($result,200, "Successful","Successful");
}else{
	echo badRequest(204,'Not successful');
}
?>
