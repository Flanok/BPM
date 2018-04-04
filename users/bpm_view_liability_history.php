


<?php
require_once 'init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
date_default_timezone_set("America/Boise");  
/*
        $db = DB::getInstance();

        $userID = $user->data()->id;
        $company_name= $_POST['company_name'];
        $date_time= date('y/m/d h:i:sa');
        $experience_weight= $_POST['experience_weight'];
        $experience_grade= $_POST['experience_grade'];
        $economic_weight= $_POST['economic_weight'];
        $economic_grade= $_POST['economic_grade'];
        $working_capital_weight= $_POST['capital_weight'];
        $working_capital_grade= $_POST['capital_grade'];
        $employees_weight= $_POST['employees_weight'];
        $employees_grade= $_POST['employees_grade'];
        $relations_weight= $_POST['relationships_weight'];
        $relations_grade= $_POST['relationships_grade'];
        $capital_assets_weight= $_POST['assets_weight'];
        $capital_assets_grade= $_POST['assets_grade'];
        $marketing_weight= $_POST['marketing_weight'];
        $marketing_grade= $_POST['marketing_grade'];
        $managing_debt_weight= $_POST['debt_weight'];
        $managing_debt_grade= $_POST['debt_grade'];
        $managing_rec_pay_weight= $_POST['rec_pay_weight'];
        $managing_rec_pay_grade= $_POST['rec_pay_grade'];
        $cash_controls_weight= $_POST['cash_weight'];
        $cash_controls_grade= $_POST['cash_grade'];

    $fields=array(
        'company_name'=>$company_name,
        'date_time'=>$date_time,
        'experience_weight'=>$experience_weight,
        'experience_grade'=>$experience_grade,
        'economic_weight'=>$economic_weight,
        'economic_grade'=>$economic_grade,
        'working_capital_weight'=>$working_capital_weight,
        'working_capital_grade'=>$working_capital_grade,
        'employees_weight'=>$employees_weight,
        'employees_grade'=>$employees_grade,
        'relations_weight'=>$relations_weight,
        'relations_grade'=>$relations_grade,
        'capital_assets_weight'=>$capital_assets_weight,
        'capital_assets_grade'=>$capital_assets_grade,
        'marketing_weight'=>$marketing_weight,
        'marketing_grade'=>$marketing_grade,
        'managing_debt_weight'=>$managing_debt_weight,
        'managing_debt_grade'=>$managing_debt_grade,
        'managing_rec_pay_weight'=>$managing_rec_pay_weight,
        'managing_rec_pay_grade'=>$managing_rec_pay_grade,
        'cash_controls_weight'=>$cash_controls_weight,
        'cash_controls_grade'=>$cash_controls_grade,
        'users_id'=>$userID
        );
    $db->insert('business_scorecard',$fields);
 */

$id=$_GET['id'];
$userID = $user->data()->id;
$users = $db->query("SELECT * FROM liabilities");
$results = $users->results();
?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                
                <!-- ACCOUNTS PAYABLE  -->                
                
<div class="col-md-10 col-md-offset-1"> 
	<table class="table" >
    <thead class="thead-inverse">
    <tr><td colspan="8" align="Center" bgcolor="#ccffcc"><strong>Accounts Payable</strong></td></tr>
    <tr>
        <th align='center'>Date</th>
        <th align='center'>Current 30 days</th>
		<th align='center'>31-60 days</th>
		<th align='center'>61-90 days</th>
		<th align='center'>Over 90 days</th>        
		<th align='center'>Total</th>
    </tr>
    </thead>
    <tbody>
        <!--  Line 1  -->
        <div class="row">
        <tr>
            
		   <?php
            //number_format("1000000",2)
           foreach($results as $r) {
           echo "<tr>";
           $date = date_create($r->date);
               echo "<th>".date_format($date, 'm/d/Y')."</th>";
		   
		   echo "<td>$ ".number_format($r->current_to_30_days,2)."</td>";
		   echo "<td>$ ".number_format($r->days_31_60,2)."</td>";
		   echo "<td>$ ".number_format($r->days_61_90,2)."</td>";
		   echo "<td>$ ".number_format($r->over_90_days,2)."</td>";
               echo "<td>$ ".number_format($r->total_accounts_payable,2)."</td>";
           echo "</tr>";
           }?>
		</tr>
        </div>
	</tbody>
     </table>
            </div>
                
 
                                <!-- OTHER CURRENT LIABILITIES  -->                
                
<div class="col-md-10 col-md-offset-1"> 
	<table class="table" >
    <thead class="thead-inverse">
    <tr><td colspan="8" align="Center" bgcolor="#ccffcc"><strong>Accounts Payable</strong></td></tr>
    <tr>
        <th align='center'>Date</th>
        <th align='center'>Liens/Judgments</th>
		<th align='center'>Customer Prepaid Accounts</th>
		<th align='center'>Deferred Salaries</th>
		<th align='center'>Accruals- Taxes, Payroll</th> 
        <th align='center'>Balloon Payments</th>
		<th align='center'>Accrued Interest</th> 
		<th align='center'>Total</th>
    </tr>
    </thead>
    <tbody>
        <!--  Line 1  -->
        <div class="row">
        <tr>
            
		   <?php
            //number_format("1000000",2)
           foreach($results as $r) {
           echo "<tr>";
           $date = date_create($r->date);
               echo "<th>".date_format($date, 'm/d/Y')."</th>";
		   
		   echo "<td>$ ".number_format($r->liens_judgments,2)."</td>";
		   echo "<td>$ ".number_format($r->customer_prepaid_accounts,2)."</td>";
		   echo "<td>$ ".number_format($r->deferred_salaries,2)."</td>";
		   echo "<td>$ ".number_format($r->accruals_taxes_payroll,2)."</td>";
           echo "<td>$ ".number_format($r->balloon_payments,2)."</td>";
           echo "<td>$ ".number_format($r->accrued_interest,2)."</td>";
           echo "<td>$ ".number_format($r->other_total,2)."</td>";
           echo "</tr>";
           }?>
		</tr>
        </div>
	</tbody>
     </table>
            </div>
                
                
                               <!-- DEBT CONTINUED  -->                
                
<div class="col-md-10 col-md-offset-1"> 
	<table class="table" >
    <thead class="thead-inverse">
    <tr><td colspan="8" align="Center" bgcolor="#ccffcc"><strong>Debt Continued</strong></td></tr>
    <tr>
        <th align='center'>Date</th>
        <th align='center'>Debt Itemization</th>
		<th align='center'>Long Term Obligations</th>
		<th align='center'>Leases</th> 
		<th align='center'>Total</th>
    </tr>
    </thead>
    <tbody>
        <!--  Line 1  -->
        <div class="row">
        <tr>
            
		   <?php
            //number_format("1000000",2)
           foreach($results as $r) {
           echo "<tr>";
           $date = date_create($r->date);
               echo "<th>".date_format($date, 'm/d/Y')."</th>";
		   
		   echo "<td>$ ".number_format($r->debt_itemization,2)."</td>";
		   echo "<td>$ ".number_format($r->long_term_obligations,2)."</td>";
		   echo "<td>$ ".number_format($r->leases,2)."</td>";
           
    // THIS QUERY DOES NOT SEEM TO BE CORRECT FOR TOTAL LIABILITIES!!!!
           echo "<td>$ ".number_format($r->total_liabilities,2)."</td>";
           echo "</tr>";
           }?>
		</tr>
        </div>
	</tbody>
     </table>
            </div>
                
                
                
            </div>
        </div>
    </div>
</div>


<!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->

<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>