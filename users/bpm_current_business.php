<?php
require_once 'init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
?>

<?php

date_default_timezone_set("America/Boise");  

$db = DB::getInstance();

$userID = $user->data()->id;


//$users = $db->query("SELECT *, COUNT(company_name) AS 'total' FROM business_scorecard WHERE users_id = $userID GROUP BY company_name");

//$stmt = $db->query("SELECT * FROM business WHERE user_id = $userID");
$stmt = $db->query("SELECT * FROM business WHERE user_id = $userID");
$biz = $stmt->results();
//$results = $stt->results(); 
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <h1>Your Current Businesses: </h1>

        <!--Display Current Businesses-->
        <div class="col-sm-12">
            <?php
            foreach($biz as $biz) {
                    $id = $biz->id;
                    $name = $biz->name;

                    echo "<br/><a class='btn btn-primary ' href='bpm_business_info.php?id=$id' role='button'>$name</a><br/>";
            }
            ?>
        <!--Insert New Business Option:-->
        <br/>
        <h4>Add New Business: </h4> 
            <form method="post" action="bpm_add_business.php">
				Company Name:<input style="margin:0 1em 0 1em; width: 50%;" type="text" id="company_name" name="company_name" size="40" required>    
				<button type="submit">Add Business</button>
            </form>
        </div>
    </div>
</div>
