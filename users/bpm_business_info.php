<?php
require_once 'init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
require_once 'bpm_individual_biz_nav_tabs.php';

date_default_timezone_set("America/Boise");  

$id=$_GET['id'];
$db = DB::getInstance();

$userID = $user->data()->id;

$users = $db->query("SELECT * FROM assets WHERE business_id = $id ORDER BY date_time DESC LIMIT 1");
$results = $users->results();
$date = date_create($results[0]->date_time);

$sql = $db->query("SELECT * FROM liabilities WHERE business_id = $id ORDER BY date_time DESC LIMIT 1");
$liabilities = $sql->results();

$stmt = $db->query("SELECT name FROM business WHERE id = $id");
$result = $stmt->results(); 
$company_name = $result[0]->name;

?>   

<!-- STYLING FOR THE TABLES ON THIS PAGE  -->
<style>
    th {
        width:70%;
    }
</style>       


<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="col-md-10 col-md-offset-1"> 
                    <h1>Welcome to <?php echo $company_name?>'s Business Pulse Manager!</h1>
                    <h3>Latest summary as of <?php echo date_format($date, 'm/d/Y');?></h3>
                </div> 
                <!-- CURRENT ASSETS  -->                


                <div class="col-md-10 col-md-offset-1"> 
                    <table class="table" >
                        <thead class="thead-inverse">
                            <tr><td colspan="8" align="center" bgcolor="#ccffcc"><strong>Current Assets</strong></td></tr>
                        </thead>
                        <tbody>
                            <!--  Line 1  -->
                            <div class="row">
                                <tr>

                                    <?php
                                    //number_format("1000000",2)
                                    foreach($results as $r) {

                                        echo "<tr>";
                                        echo "<th>Cash and Equivalents</th>";
                                        echo "<td>$ ".number_format($r->cash_and_equivalents_total,2)."</td>";
                                        echo "</tr>";

                                        echo "<tr>";
                                        echo "<th>Accounts Receivable</th>";
                                        echo "<td>$ ".number_format($r->accounts_receivable_total,2)."</td>";
                                        echo "</tr>";

                                        echo "<tr>";
                                        echo "<th>Inventory</th>";
                                        echo "<td>$ ".number_format($r->inventory_total,2)."</td>";
                                        echo "</tr>";

                                        echo "<tr>";
                                        echo "<th>Other Current Assets</th>";
                                        echo "<td>$ ".number_format($r->other_total,2)."</td>";
                                        echo "</tr>";               

                                        echo "<tr>";
                                        echo "<th>Total Assets</th>";
                                        echo "<td>$ ".number_format($r->asset_total,2)."</td>";
                                        echo "</tr>";               


                                        $total_assets = $r->asset_total;
                                        $cash_equiv_total = $r->cash_and_equivalents_total;
                                    }?>
                                </tr>
                            </div>
                        </tbody>
                    </table>
                </div>


                <!-- CURRENT LIABILITIES  -->                

                <div class="col-md-10 col-md-offset-1"> 
                    <table class="table" >
                        <thead class="thead-inverse">
                            <tr><td colspan="8" align="center" bgcolor="#ccffcc"><strong>Current Liabilities</strong></td></tr>
                        </thead>
                        <tbody>
                            <!--  Line 1  -->
                            <div class="row">
                                <tr>

                                    <?php
                                    //number_format("1000000",2)
                                    foreach($liabilities as $l) {

                                        echo "<tr>";
                                        echo "<th>Accounts Payable</th>";
                                        echo "<td>$ ".number_format($l->total_accounts_payable,2)."</td>";
                                        echo "</tr>";

                                        echo "<tr>";
                                        echo "<th>Other Current Liabilities</th>";
                                        echo "<td>$ ".number_format($l->other_total,2)."</td>";
                                        echo "</tr>";

                                        echo "<tr>";
                                        echo "<th>Debt Continued Total</th>";
                                        echo "<td>$ ".number_format($l->debt_continued_total,2)."
           </td>";
                                        echo "</tr>";

                                        echo "<tr>";
                                        echo "<th>Liabilities Total</th>";
                                        echo "<td>$ ".number_format($l->total_liabilities,2)."</td>";       
                                        echo "</tr>";    

                                        $total_liabilities = $l->total_liabilities;

                                    }?>
                                </tr>
                            </div>
                        </tbody>
                    </table>
                </div>      

                <!-- WORKING CAPITAL, CURRENT RATIOS, SALES  -->                

                <div class="col-md-10 col-md-offset-1"> 
                    <table class="table" >
                        <thead class="thead-inverse">
                            <tr><td colspan="8" align="center" bgcolor="#ccffcc"><strong>Working Capital, Current Ratio, Sales</strong></td></tr>
                        </thead>
                        <tbody>
                            <!--  Line 1  -->
                            <div class="row">
                                <tr>

                                    <?php
                                    //number_format("1000000",2)
                                    foreach($liabilities as $l) {

                                        $working_capital = $total_assets - $total_liabilities;

                                        echo "<tr>";
                                        echo "<th>Working Capital</th>";
                                        echo "<td>$ ".number_format($working_capital,2)."</td>";
                                        echo "</tr>";

                                        echo "<tr>";
                                        echo "<th>Current Ratio</th>";
                                        echo "<td>".number_format($total_assets / $total_liabilities,2)."<strong> : </strong>1</td>";
                                        echo "</tr>";

                                        echo "<tr>";
                                        echo "<th>Sales</th>";
                                        echo "<td>$ ".number_format($cash_equiv_total,2)."</td>";
                                        echo "</tr>";

                                    }?>
                                </tr>
                            </div>
                        </tbody>
                    </table>
                </div> 


                <!-- OWNER'S VS CREDITOR'S FINANCIAL CONTRIBUTION TO DAY-TO-DAY OPERATIONS  -->                

                <div class="col-md-10 col-md-offset-1"> 
                    <table class="table" >
                        <thead class="thead-inverse">
                            <tr><td colspan="8" align="center" bgcolor="#ccffcc"><strong>Owner's vs Creditor's Financial Contribution to Day-to-Day Operations</strong></td></tr>
                        </thead>
                        <tbody>
                            <!--  Line 1  -->
                            <div class="row">
                                <tr>

                                    <?php
                                    //number_format("1000000",2)
                                    foreach($liabilities as $l) {       

                                        echo "<tr>";
                                        echo "<th>Current Liabilities (Creditor's Contribution)</th>";
                                        echo "<td>$ ".number_format($total_liabilities,2)."</td>";
                                        echo "</tr>";

                                        echo "<tr>";
                                        echo "<th>Working Capital (Owner's Contribution)</th>";
                                        echo "<td>$".number_format($working_capital,2)."</td>";
                                        echo "</tr>";

                                        echo "<tr>";
                                        echo "<th>Total</th>";
                                        echo "<td>$".number_format($working_capital + $total_liabilities,2)."</td>";
                                        echo "</tr>";

                                        echo "<tr>";
                                        echo "<th>Owner's Contribution %</th>";
                                        echo "<td><strong>".number_format(($working_capital/($working_capital + $total_liabilities))*100,2)."%</strong></td>";
                                        echo "</tr>";

                                        echo "<tr>";
                                        echo "<th>Creditor's Contribution %</th>";
                                        echo "<td><strong>".number_format((($total_liabilities)/($working_capital + $total_liabilities))*100,2)."%</strong></td>";
                                        echo "</tr>";

                                    }?>
                                </tr>
                            </div>
                        </tbody>
                    </table>
                    <!--       Delete Info-->
                    <?php 
                    echo "<br/>
<form method='post' action='bpm_delete_business_db.php?id=$id'>
<button class='btn btn-primary' type='submit'> <strong>Delete:</strong> '".$company_name."' and It's Financial Records</button>
</form><br/><br/>"; ?>
                </div> 

                <!-- footers -->
                <?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

                <!-- Place any per-page javascript here -->

                <?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>
