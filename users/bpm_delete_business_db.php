
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" integrity="sha256-eetZG6Bzom5c8rWDuJiky3M1sJ3IGwNd/FIl/nmyMh0=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js" integrity="sha256-VNbX9NjQNRW+Bk02G/RO6WiTKuhncWI4Ey7LkSbE+5s=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js" integrity="sha256-N2Q5nbMunuogdOHfjiuzPsBMhoB80TFONAfO7MLhac0=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js" integrity="sha256-N2Q5nbMunuogdOHfjiuzPsBMhoB80TFONAfO7MLhac0=" crossorigin="anonymous"></script>
<?php
require_once 'init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
$id=$_GET['id'];

if($user->isLoggedIn()) { $thisUserID = $user->data()->id;} else { $thisUserID = 0; }

$userQ = $db->query("SELECT * FROM users LEFT JOIN profiles ON users.id = user_id ");
// group active, inactive, on naughty step
$users = $userQ->results();

date_default_timezone_set("America/Boise");


$db = DB::getInstance();

$userID = $user->data()->id;

$db->delete('assets', array('business_id', '=', $id));
$db->delete('liabilities', array('business_id', '=', $id));
$db->delete('business_scorecard', array('business_id', '=', $id));
$db->delete('business', array('id', '=', $id));



//if (($db->exec($stmt) === TRUE) && ($db->exec($stmt1) === TRUE) && ($db->exec($stmt2) === TRUE) && ($db->exec($stmt3) === TRUE) ) {
    echo '<script language="javascript">';
	echo 'alert("Business successfully deleted")';
	echo '</script>';
//} else {
// 	echo 'alert("Error deleting business: "' .$db->error.')';
//	echo '<script language="javascript">';
//	echo '</script>';
//}

?>
        <!-- footers -->
        <?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

        <!-- Place any per-page javascript here -->
        <?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>
<?php
header("Location: bpm_current_business.php");
die();?>
