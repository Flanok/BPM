<?php
require_once 'init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
date_default_timezone_set("America/Boise");  

$id=$_GET['id'];
$userID = $user->data()->id;
$users = $db->query("SELECT * FROM assets WHERE business_id = $id ORDER BY date_time DESC");
$results = $users->results();

$stmt = $db->query("SELECT name FROM business WHERE id = $id");
$result = $stmt->results(); 
$company_name = $result[0]->name;

?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">

<h1>Asset History For <?php echo $company_name?></h1>
 
<!-- CASH AND EQUIVALENTS  -->                
                
<div class="col-md-10 col-md-offset-1"> 
	<table class="table" >
    <thead class="thead-inverse">
    <tr><td colspan="8" align="center" bgcolor="#ccffcc"><strong>Cash and Equivalents</strong></td></tr>
    <tr>
        <th align='center'>Date</th>
        <th align='center'>Cash</th>
		<th align='center'>Checking</th>
		<th align='center'>Pay Pal Account</th>
		<th align='center'>Payroll Account Balance</th>
		<th align='center'>Savings</th>
		<th align='center'>Pre-paid Accounts</th>
        
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
		   
		   echo "<td>$ ".number_format($r->cash,2)."</td>";
		   echo "<td>$ ".number_format($r->checking,2)."</td>";
		   echo "<td>$ ".number_format($r->pay_pal_account,2)."</td>";
		   echo "<td>$ ".number_format($r->payroll_account_balance,2)."</td>";
		   echo "<td>$ ".number_format($r->savings,2)."</td>";
		   echo "<td>$ ".number_format($r->pre_paid_accounts,2)."</td>";
               echo "<td>$ ".number_format($r->cash_and_equivalents_total,2)."</td>";
           echo "</tr>";
           }?>
		</tr>
        </div>
	</tbody>
     </table>
            </div>
                
<!-- ACCOUNTS RECEIVABLE  -->
                
     <div class="col-md-10 col-md-offset-1"> 
	<table class="table" >
    <thead class="thead-inverse">
    <tr><td colspan="8" align="center" bgcolor="#ccffcc"><strong>Accounts Receivable</strong></td></tr>
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
		   echo "<td>$ ".number_format($r->current_30_days,2)."</td>";
		   echo "<td>$ ".number_format($r->days_31_60,2)."</td>";
               echo "<td>$ ".number_format($r->days_61_90,2)."</td>";
		   echo "<td>$ ".number_format($r->over_90_days,2)."</td>";
               echo "<td>$ ".number_format($r->accounts_receivable_total,2)."</td>";
           echo "</tr>";
           }?>
		</tr>
        </div>
	</tbody>
     </table>
            </div>
                
<!-- INVENTORY  -->
                
     <div class="col-md-10 col-md-offset-1"> 
	<table class="table" >
    <thead class="thead-inverse">
    <tr><td colspan="8" align="center" bgcolor="#ccffcc"><strong>Inventory</strong></td></tr>
    <tr>
        <th align='center'>Date</th>
		<th align='center'>Supplies</th>
        <th align='center'>Miscellaneous</th>
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
		   echo "<td>$ ".number_format($r->supplies,2)."</td>";
		   echo "<td>$ ".number_format($r->miscellaneous,2)."</td>";
               echo "<td>$ ".number_format($r->inventory_total,2)."</td>";
           echo "</tr>";
           }?>
		</tr>
        </div>
	</tbody>
     </table>
            </div>
                
                
<!-- OTHER CURRENT ASSETS  -->
                
     <div class="col-md-10 col-md-offset-1"> 
	<table class="table" >
    <thead class="thead-inverse">
    <tr><td colspan="8" align="center" bgcolor="#ccffcc"><strong>Other Current Assets</strong></td></tr>
    <tr>
        <th align='center'>Date</th>
		<th align='center'>Earned Rents Receivable</th>
        <th align='center'>Current Portion Notes Rec.</th>
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
		   echo "<td>$ ".number_format($r->earned_rents_receivable,2)."</td>";
		   echo "<td>$ ".number_format($r->current_portion_notes_rec,2)."</td>";
               echo "<td>$ ".number_format($r->other_total,2)."</td>";
           echo "</tr>";
           }?>
		</tr>
        </div>
	</tbody>
     </table>
            </div>    
                
<!-- TOTAL ASSETS  -->
                
     <div class="col-md-10 col-md-offset-1"> 
	<table class="table" >
    <thead class="thead-inverse">
    <tr><td colspan="8" align="center" bgcolor="#ccffcc"><strong>Total Assets</strong></td></tr>
    <tr>
        <th align='center'>Date</th>
		<th align='center'>Total Assets</th>
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
		   echo "<td>$ ".number_format($r->asset_total,2)."</td>";
           echo "</tr>";
           }?>
		</tr>
        </div>
	</tbody>
     </table>
            </div> 
                
</div>


<!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>