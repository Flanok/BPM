<?php
require_once 'init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
?>

<?php

date_default_timezone_set("America/Boise");  

$db = DB::getInstance();

$userID = $user->data()->id;

$users = $db->query("SELECT *, COUNT(company_name) AS 'total' FROM business_scorecard WHERE users_id = $userID GROUP BY company_name");
$results = $users->results(); 
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <h1>Your Current Businesses: </h1>

        <!--Display Current Businesses-->
        <div class="col-sm-12">
            <?php
            foreach($results as $r) {
                if ($r->users_id == $userID) 
                    $id = $r->id;
                    //echo "<h3>$r->company_name</h3>";
                    echo "<br/><a class='btn btn-primary ' href='bpm_business_info.php?id=$id' role='button'>$r->company_name</a><br/>";
            }
            ?>
        <!--Insert New Business Option:-->
        <br/>
        <h4>Add New Business: </h4> 
        <p>
            <?php
            echo "<a class='btn btn-primary ' href='business_scorecard_insert.php?id=$userID' role='button'>Add New Business</a>";
            ?>
        </p>
        </div>
    </div>
</div>
