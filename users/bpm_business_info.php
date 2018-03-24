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
$users = $db->query("SELECT * FROM business_scorecard WHERE users_id = $userID AND id = $id");
$results = $users->results(); 
$company_name = $results[0]->company_name;

//Loop through the business name and the date it was inserted into the database
?>   

<div id="page-wrapper">
    <div class="container-fluid">
        <?php
        
        echo "<h1>I pity the foo - $company_name</h1>
        
        <!--        Score Card-->
        <!--        Needs to be fixed-->
        <a class='btn btn-primary ' href='business_scorecard_business_list_by_date.php?id=$id' role='button'>Score Card</a>
        <br/>

        <!--        Data Log-->
        <br/>
        <a class='btn btn-primary ' href='bpm_data_log.php' role='button'>Data Log</a>
        <br/>

        <!--        Assets-->
        <br/>
        <a class='btn btn-primary ' href='business_scorecard_current_assets.php' role='button'>Assets</a>
        <br/>

        <!--        Liabilities-->
        <br/>
        <a class='btn btn-primary ' href='business_scorecard_current_liabilities.php' role='button'>Liabilities</a>
        <br/>

        <!--        Edit Info-->
        <br/>
        <a class='btn btn-primary ' href='business_scorecard_update.php?id=$id' role='button'>Edit Info</a><br/>";
?>

<h2>Then the business Pulse Manager Info will be displayed underneath</h2>

