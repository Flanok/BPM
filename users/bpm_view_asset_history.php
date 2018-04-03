

<?php
require_once 'init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
date_default_timezone_set("America/Boise");  


$id=$_GET['id'];
$userID = $user->data()->id;
$users = $db->query("SELECT * FROM business_scorecard WHERE users_id = $userID AND id = $id");
$results = $users->results();
?>


<h1>Asset History Table Will Go Here. Link from main page needs to be added. </h1>

<div id="page-wrapper">
    <div class="container-fluid">

<?php
require_once 'init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
date_default_timezone_set("America/Boise");  

$id=$_GET['id'];
$userID = $user->data()->id;
$users = $db->query("SELECT * FROM business_scorecard WHERE users_id = $userID AND id = $id");
$results = $users->results();
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">

<h1>Asset History Table Will Go Here. Link from main page needs to be added. </h1>
 <div class="col-md-10 col-md-offset-1"> 
	<table class="table" >
    <thead class="thead-inverse">
    <tr><td colspan="8" align="center" bgcolor="#ccffcc"><strong>Cash and Equivalents</strong></td></tr>
    <tr>
        <th align='center'>Date</th>
		<th align='center'>Cash & Equivalent Total</th>
        <th align='center'>Cash</th>
		<th align='center'>Checking</th>
		<th align='center'>Pay Pal Account</th>
		<th align='center'>Payroll Account Balance</th>
		<th align='center'>Savings</th>
		<th align='center'>Pre-paid Accounts</th>
    </tr>
    </thead>
    <tbody>
        <!--  Line 1  -->
        <div class="row">
        <tr>
		   <?php
           foreach($results as $r) {
           echo "<th>Date</th>";
		   echo "<td>Cash & Equivalent Total</td>";
		   echo "<td>Cash</td>";
		   echo "<td>Checking</td>";
		   echo "<td>Pay Pal Account</td>";
		   echo "<td>Payroll Account Balance</td>";
		   echo "<td>Savings</td>";
		   echo "<td>Pre-paid Accounts</td>";
           }?>
		</tr>
        </div>
	</tbody>
            </div>
</div>


<!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>