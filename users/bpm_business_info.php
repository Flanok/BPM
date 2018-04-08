<?php
require_once 'init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
?>

<?php

date_default_timezone_set("America/Boise");  

$id=$_GET['id'];
$db = DB::getInstance();

$userID = $user->data()->id;


// $users = $db->query("SELECT *, COUNT(company_name) AS 'total' FROM business_scorecard WHERE users_id = $userID GROUP BY company_name");
$stmt = $db->query("SELECT * FROM business WHERE id = $id");
$results = $stmt->results(); 
$company_name = $results[0]->name;

//Loop through the business name and the date it was inserted into the database
?>   

<div id="page-wrapper">
    <div class="container-fluid">
        <?php
        
        echo "<h1>Company: $company_name</h1>
        <div class='col-md-10 col-md-offset-1'> 
        <!--        Score Card-->
        <a class='btn btn-primary ' href='business_scorecard_business_list_by_date.php?id=$id' role='button'>Score Card History</a>
        <br/>

		<!--        Score Card-->
		<br/>
        <a class='btn btn-primary ' href='business_scorecard_insert.php?id=$id' role='button'>Insert Score Card</a>
        <br/>

        <!--        Data Log-->
        <br/>
        <a class='btn btn-primary ' href='bpm_data_log.php?id=$id' role='button'>Data Log</a>
        <br/>

        <!--        Assets Update-->
        <br/>
        <a class='btn btn-primary ' href='business_scorecard_current_assets.php?id=$id' role='button'>Update Assets</a>
        <br/>

		<!--        Asset History-->
        <br/>
        <a class='btn btn-primary ' href='bpm_view_asset_history.php?id=$id' role='button'>View Asset History</a>
        <br/>

        <!--        Liabilities Update-->
        <br/>
        <a class='btn btn-primary ' href='business_scorecard_current_liabilities.php?id=$id' role='button'>Update Liabilities</a>
        <br/>

		<!--        Liabilities History-->
        <br/>
        <a class='btn btn-primary ' href='bpm_view_liability_history.php?id=$id' role='button'>View Liability History</a>
        <br/>

        <!--       Delete Info-->
        <br/><br/>
		<form method='post' action='bpm_delete_business_db.php?id=$id'>
		<button type='submit'> <strong>Delete:</strong> '".$company_name."' and It's Financial Records</button>
		</form>
		";

?>

<h2>Then the business Pulse Manager Info will be displayed underneath</h2>

