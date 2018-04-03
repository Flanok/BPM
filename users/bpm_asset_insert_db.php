
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
//$company_id = $_POST['id'];
//$userID = $user->data()->id;

$cash = $_POST['cash_amount'];
$checking = $_POST['checking_amount'];
$pay_pal_account= $_POST['pay_pal_amount'];
$payroll_account_balance= $_POST['payroll_amount'];
$savings= $_POST['savings_amount'];
$pre_paid_accounts= $_POST['prepaid_amount'];
$cash_and_equivalents_total = $cash + $checking + $pay_pal_account + $payroll_account_balance + $savings + $pre_paid_accounts;

$current_30_days= $_POST['30_days'];
$days_31_60= $_POST['31_60_days'];
$days_61_90= $_POST['61_90_days'];
$over_90_days= $_POST['over_90_days'];
$accounts_receivable_total = $current_30_days + $days_31_60 + $days_61_90 + $over_90_days;

$supplies= $_POST['supplies_value'];
$miscellaneous= $_POST['miscellaneous_value'];
$inventory_total = $supplies + $miscellaneous;

$earned_rents_receivable= $_POST['earned_rents_receivable_amount'];
$current_portion_notes_rec= $_POST['current_portion_notes_rec_amount'];
$other_total = $earned_rents_receivable + $current_portion_notes_rec;

$asset_total = $cash_and_equivalents_total + $accounts_receivable_total + $inventory_total + $other_total;
$date_time= date('y/m/d h:i:sa');
//$business_id = ?

$fields=array(
    
	'cash'=>$cash,
	'checking'=>$checking, 
	'pay_pal_account'=>$pay_pal_account,
	'payroll_account_balance'=>$payroll_account_balance,
	'savings'=>$savings,
	'pre_paid_accounts'=>$pre_paid_accounts, 
	'cash_and_equivalents_total'=>$cash_and_equivalents_total,
	
	'current_30_days'=>$current_30_days, 
	'days_31_60'=>$days_31_60, 
	'days_61_90'=>$days_61_90, 
	'over_90_days'=>$over_90_days, 
	'accounts_receivable_total'=>$accounts_receivable_total, 
	
	'supplies'=>$supplies, 
	'miscellaneous'=>$miscellaneous,
	'inventory_total'=>$inventory_total, 
	
	'earned_rents_receivable'=>$earned_rents_receivable,
	'current_portion_notes_rec'=>$current_portion_notes_rec, 
	'other_total'=>$other_total, 
	
	'asset_total'=>$asset_total

	//'business_id'=>$business_id

);
$db->insert('assets', $fields);

//$query = $db->query("SELECT business_id FROM business_scorecard WHERE business_id = ? AND date = ?",[$userID,$date_time]);
//$id_company = $query->first();
//$company_id = $id_company->id;

?>

        <!-- footers -->
        <?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

        <!-- Place any per-page javascript here -->
        <?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>

<!--Redirect to Asset History display-->
<?php 
header("Location: business_scorecard_current_assets_view.php?id=$id");
die();?>