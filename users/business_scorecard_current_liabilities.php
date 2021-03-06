<?php
require_once 'init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
require_once 'bpm_individual_biz_nav_tabs.php';


$id=$_GET['id'];

$stmt = $db->query("SELECT name FROM business WHERE id = $id");
$results = $stmt->results(); 
$company_name = $results[0]->name;
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" integrity="sha256-eetZG6Bzom5c8rWDuJiky3M1sJ3IGwNd/FIl/nmyMh0=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js" integrity="sha256-VNbX9NjQNRW+Bk02G/RO6WiTKuhncWI4Ey7LkSbE+5s=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js" integrity="sha256-N2Q5nbMunuogdOHfjiuzPsBMhoB80TFONAfO7MLhac0=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js" integrity="sha256-N2Q5nbMunuogdOHfjiuzPsBMhoB80TFONAfO7MLhac0=" crossorigin="anonymous"></script>

<!-- <php if (!securePage($_SERVER['PHP_SELF'])){die();} ?>-->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">

                <h1>Insert Current Liability Log For <?php echo $company_name?></h1>

                <div class="col-md-6 col-md-offset-3">    
                    <form method="post" id="liability_update_form" onsubmit="return checkBusinessName(); return checkForm();"  name="liability_update_form" action="bpm_liability_insert_db.php<?php echo "?id=$id"?>">
                        <input type="hidden" name="country" value="">
                        <table class="table" >
                            <thead class="thead-inverse">

                                <tr>
                                    <th></th>    
                                    <th>Date</th>
                                    <th colspan="2">
                                        <?php 
    date_default_timezone_set("America/Boise");
                    echo date('Y/M/d') . " at " . date('h:i:sa') . " MST"
                                        ?>
                                    </th>
                                </tr> 
                                <tr><td></td></tr>
                            </thead>
                        </table>

                        <!-- Accounts Payable - Schedule #5 -->    
                        <table class="table" >
                            <thead class="thead-inverse">
                                <tr><td colspan="3" align="center" bgcolor="#ccffcc"><strong>Accounts Payable</strong></td></tr>
                                <tr>
                                    <th></th>    
                                    <th align="center">Accounts Payable</th>
                                    <th align="center">Amount</th>
                                </tr>
                            </thead>     

                            <tbody>  
                                <!--  Line 1  -->
                                <tr>
                                    <th scope="row">1</th>
                                    <td nowrap>Current 30 days</td>
                                    <td>
                                        <input required type="text" id="30_days" name="30_days" size="15" >
                                    </td>
                                </tr>

                                <!--  Line 2  -->
                                <tr>
                                    <th scope="row">2</th>
                                    <td>31-60 days</td>
                                    <td>
                                        <input required type="text" id="31_60_days" name="31_60_days" size="15" >
                                    </td>
                                </tr>

                                <!--  Line 3  -->
                                <tr>
                                    <th scope="row">3</th>
                                    <td>61-90 days</td>
                                    <td>
                                        <input required type="text" id="61_90_days" name="61_90_days" size="15" >
                                    </td>
                                </tr>

                                <!--  Line 4  -->
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Over 90 days</td>
                                    <td>
                                        <input required type="text" id="over_90_days" name="over_90_days" size="15" >
                                    </td>
                                </tr>
                                <!--if two different php documents have the same ID but call javascript can it determine the difference between documents that call it-->
                                <!--  Line 5  
<tr>
<th scope="row"></th>
<td align="right"><strong>Total:</strong></td>
<td>
<div id="accounts_payable_total"></div>
</td>
<td></td>
</tr>  -->

                            </tbody>
                        </table>
                        <br/> 
                        <br/>

                        <!-- Other Current Liabilities - Schedule #6 -->      
                        <table class="table" >
                            <thead class="thead-inverse">
                                <tr>
                                    <td colspan="3" align="center" bgcolor="#ccffcc">
                                        <strong>Other Current Liabilities</strong>
                                    </td>
                                </tr>
                            </thead>     

                            <tbody>
                                <tr>
                                    <th></th>    
                                    <th align="center" nowrap>Description</th>
                                    <th align="center">Amount</th>
                                </tr>
                                <!--  Line 1  -->
                                <tr>
                                    <th scope="row">1</th>
                                    <td nowrap>Liens / Judgments</td>
                                    <td>
                                        <input required type="text" id="liens_judgments_amount" name="liens_judgments_amount" size="15" >
                                    </td>
                                </tr>
                                <!--  Line 2  -->  
                                <tr>
                                    <th scope="row">2</th>
                                    <td nowrap>Customer Prepaid Accounts</td>
                                    <td>
                                        <input required type="text" id="customer_prepaid_amount" name="customer_prepaid_amount" size="15" >
                                    </td>
                                </tr>
                                <!--  Line 3  -->   
                                <tr>
                                    <th scope="row">3</th>
                                    <td nowrap>Deferred Salaries</td>
                                    <td>
                                        <input required type="text" id="deferred_salaries_amount" name="deferred_salaries_amount" size="15" >
                                    </td>
                                </tr>
                                <!--  Line 4  -->   
                                <tr>
                                    <th scope="row">4</th>
                                    <td nowrap>Accruals - Taxes, Payroll</td>
                                    <td>
                                        <input required type="text" id="accruals_taxes_payroll_amount" name="accruals_taxes_payroll_amount" size="15" >
                                    </td>
                                </tr>
                                <!--  Line 5  -->   
                                <tr>
                                    <th scope="row">5</th>
                                    <td nowrap>Balloon Payments</td>
                                    <td>
                                        <input required type="text" id="balloon_payments_amount" name="balloon_payments_amount" size="15" >
                                    </td>
                                </tr>
                                <!--  Line 6  -->   
                                <tr>
                                    <th scope="row">6</th>
                                    <td nowrap>Accrued Interest</td>
                                    <td>
                                        <input required type="text" id="accrued_interest_amount" name="accrued_interest_amount" size="15" >
                                    </td>
                                </tr>
                                <!--  Line 7 TOTAL
<tr>
<td></td>
<td align="right"><strong>Total: </strong></td>
<td><p id="other_total"></p></td>
</tr> -->
                            </tbody>
                        </table>    

                        <!-- Debt Continued - Schedule #7 Combined -->      
                        <table class="table" >
                            <thead class="thead-inverse">
                                <tr>
                                    <td colspan="3" align="center" bgcolor="#ccffcc">
                                        <strong>Debt Continued</strong>
                                    </td>
                                </tr>
                            </thead>     

                            <tbody>  
                                <!--  Line 1  -->
                                <tr>
                                    <th scope="row">1</th>
                                    <td nowrap>Debt Itemization</td>
                                    <td>
                                        <input required type="text" id="debt_itemization" name="debt_itemization" size="15" >
                                    </td>
                                </tr>
                                <!--  Line 2  -->   
                                <tr>
                                    <th scope="row">2</th>
                                    <td nowrap>Long Term Obligations</td>
                                    <td>
                                        <input required type="text" id="long_term_obligations" name="long_term_obligations" size="15" >
                                    </td>
                                </tr>
                                <!--  Line 3  -->   
                                <tr>
                                    <th scope="row">3</th>
                                    <td nowrap>Leases</td>
                                    <td>
                                        <input required type="text" id="leases" name="leases" size="15" >
                                    </td>
                                </tr>
                                <!--  Line 4
<tr>
<td></td>
<td align="right"><strong>Total: </strong></td>
<td><p id="debt_continued_total"></p></td>
</tr>  -->
                            </tbody>
                        </table>
                        <br/> 
                        <br/> 
                        </table>    
                    <!--<strong>Total Liabilities: <span id="liability_total"></span></strong> -->
                    <br/>
                    <br/>
                    <button class='btn btn-primary' type="submit" onclick="" id="liability_update_button">Insert Liability Log</button>
                </div> 
                </form>

            <!-- footers -->
            <?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

            <!-- Place any per-page javascript here -->

            <?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>

