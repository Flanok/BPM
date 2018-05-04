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
            <h3>Add New Business: </h3> 
            <form method="post" action="bpm_add_business.php">
                <div> <h4>Company Name:<input style="margin:0 1em 0 1em; width: 40%;" type="text" id="company_name" name="company_name" size="40" required></h4></div>
                <div> <button style="width: 52%" class='btn btn-primary' type="submit">Add Business</button> </div>
            </form>
            <br/><br/>
        </div>
    </div>
</div>
<!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->

<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>
