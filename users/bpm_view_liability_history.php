<?php
require_once 'init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
date_default_timezone_set("America/Boise");  

$id=$_GET['id'];
$userID = $user->data()->id;
$users = $db->query("SELECT * FROM liabilities WHERE business_id = $id ORDER BY date_time DESC");
$results = $users->results();

$stmt = $db->query("SELECT name FROM business WHERE id = $id");
$result = $stmt->results(); 
$company_name = $result[0]->name;

?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
<h1>Liability History For <?php echo $company_name?></h1>

                
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
           $date = date_create($r->date_time);
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
           $date = date_create($r->date_time);
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
           $date = date_create($r->date_time);
               echo "<th>".date_format($date, 'm/d/Y')."</th>";
		   
		   echo "<td>$ ".number_format($r->debt_itemization,2)."</td>";
		   echo "<td>$ ".number_format($r->long_term_obligations,2)."</td>";
		   echo "<td>$ ".number_format($r->leases,2)."</td>";
		   echo "<td>$ ".number_format($r->debt_continued_total,2)."</td>";
           echo "</tr>";
           }?>
		</tr>
        </div>
	</tbody>
     </table>
            </div>
                
                <div class="col-md-10 col-md-offset-1"> 
	<table class="table" >
    <thead class="thead-inverse">
    <tr><td colspan="8" align="center" bgcolor="#ccffcc"><strong>Total Assets</strong></td></tr>
    <tr>
        <th align='center'>Date</th>
		<th align='center'>Total Liabilities</th>
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
           $date = date_create($r->date_time);
               echo "<th>".date_format($date, 'm/d/Y')."</th>";
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