<?php
require_once 'init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
?>

<?php
$id=$_GET['id'];
$userID = $user->data()->id;
$users = $db->query("SELECT a.asset_total, a.cash_and_equivalents_total, a.accounts_receivable_total, l.total_accounts_payable, l.total_liabilities, a.date_time FROM assets a INNER JOIN liabilities l ON CAST(a.date_time AS DATE) = CAST(l.date_time  AS DATE) WHERE l.business_id = $id AND a.business_id = $id GROUP BY a.date_time DESC");
$results = $users->results();

?>


?>



<html>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-15 col-md-offset-0">

<h1>Asset History Table Will Go Here. Link from main page needs to be added. </h1>
 
<!-- CASH AND EQUIVALENTS  -->                
                
<div class="col-md-12 col-md-offset-0"> 
	<table class="table" >
    <thead class="thead-inverse">
    <tr><td colspan="12" align="center" bgcolor="#ccffcc"><strong>Cash and Equivalents</strong></td></tr>
    <tr>
        <th align='center'>Date</th>
        <th align='center'>Current Assets</th>
		<th align='center'>Current Liabilities</th>
		<th align='center'>Working Capital</th>
		<th align='center'>Working Capital %</th>
		<th align='center'>Use of Credit %</th>
		<th align='center'>Current Ratio</th>
        <th align='center'>Cash and Equivalents</th>
		<th align='center'>Current Period Sales</th>
		<th align='center'>Accounts Receivable</th>
		<th align='center'>Accounts Payable</th>
        
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
               $date = date_create($r->date_time);
               //$working_cap = ($r->asset_total - $r->liabilities);
			   $owners_cont;
			   $credit_cont;
//			   if($working_cap <= 0){}
			   echo "<tr>";
			   echo "<th>".date_format($date, 'm/d/Y')."</th>";
               echo "<td>$ ".number_format($r->asset_total,2)."</td>";
		       echo "<td>$ ".number_format($r->total_liabilities,2)."</td>";
			   echo "<td>$</td>";//Working Capital
			   echo "<td>%</td>";//Workinc Capital % (owners contribution)
			   echo "<td>%</td>";//Use of Credit % (credit contribution)
			   echo "<td></td>";//Current Ratio
               echo "<td>$ ".number_format($r->cash_and_equivalents_total,2)."</td>";
			   echo "<td>$</td>";//Current Period Sales
			   echo "<td>$".number_format($r->accounts_receivable_total,2)."</td>";
			   echo "<td>$".number_format($r->total_accounts_payable,2)."</td>";
			   echo "<td>$</td>";//Total
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
</html>