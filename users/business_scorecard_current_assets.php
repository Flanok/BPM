<?php
require_once 'init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
date_default_timezone_set("America/Boise");  
require_once 'bpm_individual_biz_nav_tabs.php';

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

                <h1>Insert Current Asset Log For <?php echo $company_name?></h1>

                <div class="col-md-6 col-md-offset-3">              
                    <form method="post" id="asset_update_form" onsubmit="return checkBusinessName(); return checkForm();"  name="asset_update_form" action="bpm_asset_insert_db.php<?php echo "?id=$id"?>">
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

                        <!-- Cash and Equivalents - Schedule #1 -->    
                        <table class="table" >
                            <thead class="thead-inverse">
                                <tr><td colspan="3" align="center" bgcolor="#ccffcc"><strong>Cash and Equivalents</strong></td></tr>
                                <tr>
                                    <th></th>    
                                    <th align="center">Description</th>
                                    <th align="center">Amount</th>
                                </tr>
                            </thead>
                            <tbody>

                                <!--  Line 1  -->
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Cash</td>
                                    <td>
                                        <input required type="text" id="cash_amount" name="cash_amount" size="15" >
                                    </td>

                                </tr>

                                <!--  Line 2  -->
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Checking</td>
                                    <td>
                                        <input required type="text" id="checking_amount" name="checking_amount" size="15" >
                                    </td>
                                </tr>

                                <!--  Line 3  -->
                                <tr>
                                    <th scope="row">3</th>
                                    <td>PayPal Account</td>
                                    <td>
                                        <input required type="text" id="pay_pal_amount" name="pay_pal_amount" size="15" >
                                    </td>
                                </tr>

                                <!--  Line 4  -->
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Payroll Account Balance</td>
                                    <td>
                                        <input required type="text" id="payroll_amount" name="payroll_amount" size="15" >
                                    </td>
                                </tr>

                                <!--  Line 5  -->
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Savings</td>
                                    <td>
                                        <input required type="text" id="savings_amount" name="savings_amount" size="15" >
                                    </td>
                                </tr>

                                <!--  Line 6  -->
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Pre-paid accounts</td>
                                    <td>
                                        <input required type="text" id="prepaid_amount" name="prepaid_amount" size="15" >
                                    </td>
                                </tr>

                                <!--  Line 7  
<tr>
<th scope="row"></th>
<td align="right"><strong>Total:</strong></td>
<td>
<div id="cash_and_equivalents_total"></div>
</td>
<td></td>
</tr> -->


                            </tbody>
                        </table>

                        <br/> 
                        <br/>

                        <!-- Accounts Receivable - Schedule #2 -->      
                        <table class="table" >
                            <thead class="thead-inverse">
                                <tr><td colspan="3" align="center" bgcolor="#ccffcc"><strong>Accounts Receivable</strong></td></tr>
                                <tr>
                                    <th></th>    
                                    <th align="center">Accounts Receivable</th>
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

                                <!--  Line 5  
<tr>
<th scope="row"></th>
<td align="right"><strong>Total:</strong></td>
<td>
<div id="accounts_receivable_total"></div>
</td>
<td></td>
</tr> -->

                            </tbody>
                        </table>
                        <br/> 
                        <br/>

                        <!-- Inventory - Schedule #3 -->      
                        <table class="table" >
                            <thead class="thead-inverse">
                                <tr>
                                    <td colspan="3" align="center" bgcolor="#ccffcc">
                                        <strong>Inventory</strong>
                                    </td>
                                </tr>
                                <!--<tr>
<td colspan="5" align="center"><strong>How is Inventory Valued? &nbsp</strong>   
<input required type="radio" name="gender" value="cost"> Cost &nbsp
<input required type="radio" name="gender" value="fair_market"> Fair Market
</td>
</tr> -->
                            </thead>     

                            <tbody>  
                                <!--  Line 1  -->
                                <tr>
                                    <th></th>    
                                    <th align="center" nowrap>Standard Categories</th>
                                    <th align="center">Value</th>
                                </tr>
                                <!--  Line 2  -->  
                                <tr>
                                    <th scope="row">1</th>
                                    <td nowrap>Supplies</td>
                                    <td>
                                        <input required type="text" id="supplies_value" name="supplies_value" size="15" >
                                    </td>
                                </tr>
                                <!--  Line 3  -->   
                                <tr>
                                    <th scope="row">2</th>
                                    <td nowrap>Miscellaneous</td>
                                    <td>
                                        <input required type="text" id="miscellaneous_value" name="miscellaneous_value" size="15" >
                                    </td>
                                </tr>
                                <!--  Line 4 
<tr>
<td></td>
<td align="right"><strong>Total: </strong></td>
<td><p id="inventory_total"></p></td>
</tr>  -->
                            </tbody>
                        </table>
                        <br/> 
                        <br/> 


                        <!-- Other Current Assets - Schedule #4 -->      
                        <table class="table" >
                            <thead class="thead-inverse">
                                <tr>
                                    <td colspan="3" align="center" bgcolor="#ccffcc">
                                        <strong>Other Current Assets</strong>
                                    </td>
                                </tr>
                            </thead>     

                            <tbody>
                                <!--  Line 1  -->
                                <tr>
                                    <th></th>    
                                    <th align="center" nowrap>Description</th>
                                    <th align="center">Amount</th>
                                </tr>
                                <!--  Line 2  -->  
                                <tr>
                                    <th scope="row">1</th>
                                    <td nowrap>Earned Rents Receivable</td>
                                    <td>
                                        <input required type="text" id="earned_rents_receivable_amount" name="earned_rents_receivable_amount" size="15" >
                                    </td>
                                </tr>
                                <!--  Line 3  -->   
                                <tr>
                                    <th scope="row">2</th>
                                    <td nowrap>Current Portion Notes Rec.</td>
                                    <td>
                                        <input required type="text" id="current_portion_notes_rec_amount" name="current_portion_notes_rec_amount" size="15" >
                                    </td>
                                </tr>
                                <!--  Line 4  
<tr>
<td></td>
<td align="right"><strong>Total: </strong></td>
<td><p id="other_total"></p></td>
</tr>  -->
                            </tbody>
                        </table>    
                        <!-- <strong>Total Assets: <span id="asset_total"></span></strong> -->
                        <br/>
                        <br/>
                        <button class='btn btn-primary' type="submit" onclick="" id="asset_update_button">Insert Asset Log</button>
                        </div> 
                    </form>

                <!-- footers -->
                <?php require_once $abs_us_root.$us_url_root."users/includes/page_footer.php"; // the final html footer copyright row + the external js calls ?>

                <!-- Place any per-page javascript here -->

                <?php require_once $abs_us_root.$us_url_root."users/includes/html_footer.php"; // currently just the closing /body and /html ?>
