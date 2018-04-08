
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

//Accounts Payable 
$current_30_days= $_POST['30_days'];
$days_31_60= $_POST['31_60_days'];
$days_61_90= $_POST['61_90_days'];
$over_90_days= $_POST['over_90_days'];
$accounts_payable_total = $current_30_days + $days_31_60 + $days_61_90 + $over_90_days;
//Other Current Liabilities
$liens_judgments_amount = $_POST['liens_judgments_amount'];
$customer_prepaid_amount = $_POST['customer_prepaid_amount'];
$deferred_salaries_amount= $_POST['deferred_salaries_amount'];
$accruals_taxes_payroll_amount= $_POST['accruals_taxes_payroll_amount'];
$balloon_payments_amount= $_POST['balloon_payments_amount'];
$accrued_interest_amount= $_POST['accrued_interest_amount'];
$other_total = $liens_judgments_amount + $customer_prepaid_amount + $deferred_salaries_amount + $accruals_taxes_payroll_amount + $balloon_payments_amount + $accrued_interest_amount; 
//Debt Continued
$debt_itemization= $_POST['debt_itemization'];
$long_term_obligations= $_POST['long_term_obligations'];
$leases= $_POST['leases'];
$debt_continued_total = $debt_itemization + $long_term_obligations + $leases;
//Liability Totals
$liability_total = $accounts_payable_total + $other_total + $debt_continued_total;

$date_time= date('y/m/d h:i:sa');
//$business_id = ?

$fields=array(
    
	'current_to_30_days'=>$current_30_days, 
	'days_31_60'=>$days_31_60, 
	'days_61_90'=>$days_61_90, 
	'over_90_days'=>$over_90_days, 
	'total_accounts_payable'=>$accounts_payable_total, 
	'liens_judgments'=>$liens_judgments_amount,
	'customer_prepaid_accounts'=>$customer_prepaid_amount,
	'deferred_salaries'=>$deferred_salaries_amount,
	'accruals_taxes_payroll'=>$accruals_taxes_payroll_amount,
	'balloon_payments'=>$balloon_payments_amount,
	'accrued_interest'=>$accrued_interest_amount, 
	'other_total'=>$other_total,
	'debt_itemization'=>$debt_itemization,
	'long_term_obligations'=>$long_term_obligations,
	'leases'=>$leases,
	'total_liabilities'=>$liability_total,

	'business_id'=>$id

);
$db->insert('liabilities', $fields);

//$query = $db->query("SELECT business_id FROM business_scorecard WHERE business_id = ? AND date = ?",[$userID,$date_time]);
//$id_company = $query->first();
//$company_id = $id_company->id;
?>
        <?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

        <!-- Place any per-page javascript here -->
        <?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>

<!--Redirect to Liability History display-->
<?php 
header("Location: bpm_view_liability_history.php?id=$id");
die();?>