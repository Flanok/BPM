<?php
/*
UserSpice 4
An Open Source PHP User Management System
by the UserSpice Team at http://UserSpice.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
?>
<?php
require_once 'init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" integrity="sha256-eetZG6Bzom5c8rWDuJiky3M1sJ3IGwNd/FIl/nmyMh0=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js" integrity="sha256-VNbX9NjQNRW+Bk02G/RO6WiTKuhncWI4Ey7LkSbE+5s=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js" integrity="sha256-N2Q5nbMunuogdOHfjiuzPsBMhoB80TFONAfO7MLhac0=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js" integrity="sha256-N2Q5nbMunuogdOHfjiuzPsBMhoB80TFONAfO7MLhac0=" crossorigin="anonymous"></script>

<!-- <php if (!securePage($_SERVER['PHP_SELF'])){die();} ?>-->

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" style="width:40%">
                        Current Assets 40% 
                    </div>
                    <div class="progress-bar progress-bar-warning" role="progressbar" style="width:10%">
                        Warning
                    </div>
                    <div class="progress-bar progress-bar-danger" role="progressbar" style="width:20%">
                        Danger
                    </div>
                </div>
                <h1>This is the Current Liabilities Page</h1>

                <div class="col-md-5 col-md-offset-1">              
                    <form method="post" id="business_scorecard_id" onsubmit="return checkBusinessName(); return checkForm()"  name="business_scorecard_id" action="business_scorecard_insert_preview.php">
                        <input type="hidden" name="country" value="">
                        <table class="table" >
                            <thead class="thead-inverse">
                                <tr>
                                    <th></th>    
                                    <th>Company Name</th>
                                    <th colspan="3"><input type="text" id="company_name" name="company_name" size="40" required> <strong style="color:red">&nbsp Required Entry</strong> </th>
                                    <th colspan="2" id="company_name_required" ></th>
                                </tr>
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
                                <tr><td colspan="5" align="center" bgcolor="#ccffcc"><strong>Accounts Payable</strong></td></tr>
                                <tr>
                                    <th></th>
                                    <th align="center">Accounts Payable</th>
                                    <th align="center">Amount</th>
                                    <th align="center">Percentages</th>
                                    <th align="center">Notes</th>
                                </tr>
                            </thead>                   

                            <!-- Accounts Payable - Schedule #1 -->    

                            <tbody>

                                <!--  Line 1  -->
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Current to 30 days</td>
                                    <td>
                                        <input type="text" id="acc_pay_30" name="acc_pay_30" size="15" required>
                                    </td>
                                    <td id="acc_pay_30_percentage" size="15"></td>
                                    <td>
                                        <input type="text" id="acc_pay_30_notes" name="acc_pay_30_notes" size="35" required>
                                    </td>
                                </tr>

                                <!--  Line 2  -->
                                <tr>
                                    <th scope="row">2</th>
                                    <td>31 - 60 days</td>
                                    <td>
                                        <input type="text" id="acc_pay_31_60" name="acc_pay_31_60" size="15" required>
                                    </td>
                                    <td id="acc_pay_31_60_percentage" size="15"></td>
                                    <td>
                                        <input type="text" id="acc_pay_31_60_notes" name="acc_pay_31_60_notes" size="35" required>
                                    </td>
                                </tr>

                                <!--  Line 3  -->
                                <tr>
                                    <th scope="row">3</th>
                                    <td>61 - 90 days</td>
                                    <td>
                                        <input type="text" id="acc_pay_61_90" name="acc_pay_61_90" size="15" required>
                                    </td>
                                    <td id="acc_pay_61_90_percentage" size="15"></td>
                                    <td>
                                        <input type="text" id="acc_pay_over_61_notes" name="acc_pay_61_90_notes" size="35" required>
                                    </td>
                                </tr>

                                <!--  Line 4  -->
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Over 90 days</td>
                                    <td>
                                        <input type="text" id="acc_pay_over_90" name="acc_pay_over_90" size="15" required>
                                    </td>
                                    <td id="acc_pay_over_90_percentage" size="15"></td>
                                    <td>
                                        <input type="text" id="acc_pay_over_90_notes" name="acc_pay_over_90_notes" size="35" required>
                                    </td>
                                </tr>

                                <!--  Line 5  -->
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Total Accounts Payable:</td>
                                    <td id="acc_pay_total" name="acc_pay_total" size="15"></td>
                                    <td id="acc_pay_total_percentage" size="15"></td>
                                    <td>
                                        <input type="text" id="acc_pay_total_notes" name="acc_pay_total_notes" size="35" required>
                                    </td>
                                </tr>

                                <!--  Line 6  -->
                                <tr style="border-top: 1px solid black">
                                    <th scope="row">6</th>
                                    <td>Payables in Collection:</td>
                                    <td>
                                        <input type="text" id="acc_pay_collect" name="acc_pay_collect" size="15" required>
                                    </td>
                                    <td id="acc_pay_collect_percentage" size="15"></td>
                                </tr>

                                <!--  Line 7  -->
                                <tr>
                                    <th scope="row">7</th>
                                    <td>Sum of 5 Largest Payables:</td>
                                    <td>
                                        <input type="text" id="5_large_pay" name="5_large_pay" size="15" required>
                                    </td>
                                    <td id="5_large_pay_percent" size="15"></td>
                                </tr>  

                            </tbody>
                        </table>
                        <input type="submit" value="Submit">
                    </form>
                    <br/> 
                    <br/>

                    <!-- Other Current Liabilities - Schedule #2 -->      
                    <form method="post" id="business_scorecard_id" onsubmit="return checkBusinessName(); return checkForm()"  name="business_scorecard_id" action="business_scorecard_insert_preview.php">
                        <table class="table" >
                            <thead class="thead-inverse">
                                <tr><td colspan="4" align="center" bgcolor="#ccffcc"><strong>Other Current Liabilities</strong></td></tr>
                                <tr>
                                    <th></th>    
                                    <th align="center">Description</th>
                                    <th align="center">Amount</th>
                                    <th align="center">Notes</th>
                                </tr>
                            </thead>     

                            <tbody>  
                                <!--  Line 1  -->
                                <tr>
                                    <th scope="row">1</th>
                                    <td nowrap>Liens / Judgments</td>
                                    <td>
                                        <input type="text" id="liens_judg_amount" name="liens_judg_amount" size="15" required>
                                    </td>
                                    <td>
                                        <input type="text" id="liens_judg_notes" name="liens_judg_notes" size="40">
                                    </td>
                                </tr>

                                <!--  Line 2  -->
                                <tr>
                                    <th scope="row">2</th>
                                    <td nowrap>Customer Prepaid Accounts</td>
                                    <td>
                                        <input type="text" id="cust_prep_acc_amount" name="cust_prep_acc_amount" size="15" required>
                                    </td>
                                    <td>
                                        <input type="text" id="cust_prep_acc_notes" name="cust_prep_acc_notes" size="40">
                                    </td>
                                </tr>

                                <!--  Line 3  -->
                                <tr>
                                    <th scope="row">3</th>
                                    <td nowrap>Deferred Salaries</td>
                                    <td>
                                        <input type="text" id="def_sal_amount" name="def_sal_amount" size="15" required>
                                    </td>
                                    <td>
                                        <input type="text" id="def_sal_notes" name="def_sal_notes" size="40">
                                    </td>
                                </tr>

                                <!--  Line 4  -->
                                <tr>
                                    <th scope="row">4</th>
                                    <td nowrap>Accruals - Taxes, Payroll</td>
                                    <td>
                                        <input type="text" id="accr_tax_payr_amount" name="accr_tax_payr_amount" size="15" required>
                                    </td>
                                    <td>
                                        <input type="text" id="accr_tax_payr_notes" name="accr_tax_payr_notes" size="40">
                                    </td>
                                </tr>

                                <!--  Line 5  -->
                                <tr>
                                    <th scope="row">5</th>
                                    <td nowrap>Balloon Payments</td>
                                    <td>
                                        <input type="text" id="balloon_pay_amount" name="balloon_pay_amount" size="15" required>
                                    </td>
                                    <td>
                                        <input type="text" id="balloon_pay_notes" name="balloon_pay_notes" size="40">
                                    </td>
                                </tr>

                                <!--  Line 6  -->
                                <tr>
                                    <th scope="row">6</th>
                                    <td nowrap>Accrued Interest - Optg. loan(s)</td>
                                    <td>
                                        <input type="text" id="accr_int_amount" name="accr_int_amount" size="15" required>
                                    </td>
                                    <td>
                                        <input type="text" id="accr_int_notes" name="accr_int_notes" size="40">
                                    </td>
                                </tr>

                                <!--  Line 7  -->
                                <tr>
                                    <th scope="row">7</th>
                                    <td nowrap>
                                        <input type="text" id="optional_1_amount_desc" name="optional_1_amount_desc" size="25" required>  
                                    </td>
                                    <td>
                                        <input type="text" id="optional_1_amount" name="optional_1_amount" size="15" required>
                                    </td>
                                    <td>
                                        <input type="text" id="optional_1_amount_notes" name="optional_1_amount_notes" size="40">
                                    </td>
                                </tr>

                                <!--  Line 8  -->
                                <tr>
                                    <th scope="row">7</th>
                                    <td nowrap>
                                        <input type="text" id="optional_2_amount_desc" name="optional_2_amount_desc" size="25" required>  
                                    </td>
                                    <td>
                                        <input type="text" id="optional_2_amount" name="optional_2_amount" size="15" required>
                                    </td>
                                    <td>
                                        <input type="text" id="optional_2_amount_notes" name="optional_2_amount_notes" size="40">
                                    </td>
                                </tr>

                                <!--  Line 8  -->
                                <tr>
                                    <th scope="row">8</th>
                                    <td>Total:</td>
                                    <td id="total_other_liabilities"></td>
                                </tr>


                            </tbody>
                        </table>
                        <input type="submit" value="Submit">
                    </form>  
                    <br/> 
                    <br/>

                    <!-- Operating Loans - Schedule #3 -->      
                    <form method="post" id="business_scorecard_id" onsubmit="return checkBusinessName(); return checkForm()"  name="business_scorecard_id" action="business_scorecard_insert_preview.php">   
                        <table class="table" >
                            <thead class="thead-inverse">
                                <tr>
                                    <td colspan="6" align="center" bgcolor="#ccffcc">
                                        <strong>Revolving Operating Loans / Credit Cards for Business Expenses</strong>
                                    </td>
                                </tr>
                            </thead>     

                            <tbody>  
                                <!--  Line 1  -->

                                <tr>
                                    <th></th>    
                                    <th align="center" nowrap>Name of Creditor</th>
                                    <th align="center">Interest Rate</th>
                                    <th align="center">Approved Limit</th>
                                    <th align="center">Current Balance</th>
                                    <th align="center">Pledged Collateral</th>
                                </tr>

                                <tr>
                                    <th scope="row">1</th>
                                    <td nowrap>
                                        <input type="text" id="name_credit_1" name="name_credit_1" size="25" required>  
                                    </td>
                                    <td>
                                        <input type="text" id="int_rate_1" name="int_rate_1" size="15" required>
                                    </td>
                                    <td>
                                        <input type="text" id="approved_limit_1" name="approved_limit_1" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="current_balance_1" name="current_balance_1" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="pledge_collat_1" name="pledge_collat_1" size="25">
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">2</th>
                                    <td nowrap>
                                        <input type="text" id="name_credit_2" name="name_credit_2" size="25" required>  
                                    </td>
                                    <td>
                                        <input type="text" id="int_rate_2" name="int_rate_2" size="15" required>
                                    </td>
                                    <td>
                                        <input type="text" id="approved_limit_2" name="approved_limit_2" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="current_balance_2" name="current_balance_2" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="pledge_collat_2" name="pledge_collat_2" size="25">
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">3</th>
                                    <td nowrap>
                                        <input type="text" id="name_credit_3" name="name_credit_3" size="25" required>  
                                    </td>
                                    <td>
                                        <input type="text" id="int_rate_3" name="int_rate_3" size="15" required>
                                    </td>
                                    <td>
                                        <input type="text" id="approved_limit_3" name="approved_limit_3" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="current_balance_3" name="current_balance_3" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="pledge_collat_3" name="pledge_collat_3" size="25">
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">3</th>
                                    <td nowrap>
                                        <input type="text" id="name_credit_3" name="name_credit_3" size="25" required>  
                                    </td>
                                    <td>
                                        <input type="text" id="int_rate_3" name="int_rate_3" size="15" required>
                                    </td>
                                    <td>
                                        <input type="text" id="approved_limit_3" name="approved_limit_3" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="current_balance_3" name="current_balance_3" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="pledge_collat_3" name="pledge_collat_3" size="25">
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">4</th>
                                    <td nowrap>
                                        <input type="text" id="name_credit_4" name="name_credit_4" size="25" required>  
                                    </td>
                                    <td>
                                        <input type="text" id="int_rate_4" name="int_rate_4" size="15" required>
                                    </td>
                                    <td>
                                        <input type="text" id="approved_limit_4" name="approved_limit_4" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="current_balance_4" name="current_balance_4" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="pledge_collat_4" name="pledge_collat_4" size="25">
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">5</th>
                                    <td nowrap>
                                        <input type="text" id="name_credit_5" name="name_credit_5" size="25" required>  
                                    </td>
                                    <td>
                                        <input type="text" id="int_rate_5" name="int_rate_5" size="15" required>
                                    </td>
                                    <td>
                                        <input type="text" id="approved_limit_5" name="approved_limit_5" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="current_balance_5" name="current_balance_2" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="pledge_collat_5" name="pledge_collat_5" size="25">
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">6</th>
                                    <td nowrap>
                                        <input type="text" id="name_credit_6" name="name_credit_6" size="25" required>  
                                    </td>
                                    <td>
                                        <input type="text" id="int_rate_6" name="int_rate_6" size="15" required>
                                    </td>
                                    <td>
                                        <input type="text" id="approved_limit_6" name="approved_limit_6" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="current_balance_6" name="current_balance_6" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="pledge_collat_6" name="pledge_collat_6" size="25">
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">7</th>
                                    <td nowrap>
                                        <input type="text" id="name_credit_7" name="name_credit_7" size="25" required>  
                                    </td>
                                    <td>
                                        <input type="text" id="int_rate_7" name="int_rate_7" size="15" required>
                                    </td>
                                    <td>
                                        <input type="text" id="approved_limit_7" name="approved_limit_7" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="current_balance_7" name="current_balance_7" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="pledge_collat_7" name="pledge_collat_7" size="25">
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">8</th>
                                    <td>Total:</td>
                                    <td id="approved_limit_total" size="15"></td>
                                    <td id="current_balance_total" size="15"></td>

                            </tbody>
                        </table>
                        <input type="submit" value="Submit">
                    </form>
                    <br/> 
                    <br/> 

                    <!-- Long Term Obligations - Schedule #7.B -->      
                    <form method="post" id="business_scorecard_id" onsubmit="return checkBusinessName(); return checkForm()"  name="business_scorecard_id" action="business_scorecard_insert_preview.php">   
                        <table class="table" >
                            <thead class="thead-inverse">
                                <tr>
                                    <td colspan="6" align="center" bgcolor="#ccffcc">
                                        <strong>Long Term Obligations</strong>
                                    </td>
                                </tr>
                            </thead>     

                            <tbody>  
                                <!--  Line 1  -->

                                <tr>
                                    <th></th>    
                                    <th align="center" nowrap>Name of Creditor</th>
                                    <th align="center">Interest Rate</th>
                                    <th align="center">Current Balance</th>
                                    <th align="center">Monthly Payments</th>
                                    <th align="center">Pledged Collateral</th>
                                </tr>

                                <tr>
                                    <th scope="row">1</th>
                                    <td nowrap>
                                        <input type="text" id="lto_name_credit_1" name="lto_name_credit_1" size="25" required>  
                                    </td>
                                    <td>
                                        <input type="text" id="lto_int_rate_1" name="lto_int_rate_1" size="15" required>
                                    </td>
                                    <td>
                                        <input type="text" id="lto_current_balance_1" name="lto_current_balance_limit_1" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="lto_monthly_payments_1" name="lto_monthly_payments_1" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="lto_pledge_collat_1" name="lto_pledge_collat_1" size="25">
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">2</th>
                                    <td nowrap>
                                        <input type="text" id="lto_name_credit_2" name="lto_name_credit_2" size="25" required>  
                                    </td>
                                    <td>
                                        <input type="text" id="lto_int_rate_2" name="lto_int_rate_2" size="15" required>
                                    </td>
                                    <td>
                                        <input type="text" id="lto_current_balance_2" name="lto_current_balance_2" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="lto_monthly_payments_2" name="lto_monthly_payments_2" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="lto_pledge_collat_2" name="lto_pledge_collat_2" size="25">
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">3</th>
                                    <td nowrap>
                                        <input type="text" id="lto_name_credit_3" name="lto_name_credit_3" size="25" required>  
                                    </td>
                                    <td>
                                        <input type="text" id="lto_int_rate_3" name="lto_int_rate_3" size="15" required>
                                    </td>
                                    <td>
                                        <input type="text" id="lto_current_balance_3" name="lto_current_balance_3" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="lto_monthly_payments_3" name="lto_monthly_payments_3" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="lto_pledge_collat_3" name="lto_pledge_collat_3" size="25">
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">4</th>
                                    <td nowrap>
                                        <input type="text" id="lto_name_credit_4" name="lto_name_credit_4" size="25" required>  
                                    </td>
                                    <td>
                                        <input type="text" id="lto_int_rate_4" name="lto_int_rate_4" size="15" required>
                                    </td>
                                    <td>
                                        <input type="text" id="lto_current_balance_4" name="lto_current_balance_4" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="lto_monthly_payments_4" name="lto_monthly_payments_4" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="lto_pledge_collat_4" name="lto_pledge_collat_4" size="25">
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">5</th>
                                    <td nowrap>
                                        <input type="text" id="lto_name_credit_5" name="lto_name_credit_5" size="25" required>  
                                    </td>
                                    <td>
                                        <input type="text" id="lto_int_rate_5" name="lto_int_rate_5" size="15" required>
                                    </td>
                                    <td>
                                        <input type="text" id="lto_current_balance_5" name="lto_current_balance_5" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="lto_monthly_payments_5" name="lto_monthly_payments_5" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="lto_pledge_collat_5" name="lto_pledge_collat_5" size="25">
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">6</th>
                                    <td nowrap>
                                        <input type="text" id="lto_name_credit_6" name="lto_name_credit_6" size="25" required>  
                                    </td>
                                    <td>
                                        <input type="text" id="lto_int_rate_6" name="lto_int_rate_6" size="15" required>
                                    </td>
                                    <td>
                                        <input type="text" id="lto_current_balance_6" name="lto_current_balance_6" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="lto_monthly_payments_6" name="lto_monthly_payments_6" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="lto_pledge_collat_6" name="lto_pledge_collat_6" size="25">
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">7</th>
                                    <td nowrap>
                                        <input type="text" id="lto_name_credit_7" name="lto_name_credit_7" size="25" required>  
                                    </td>
                                    <td>
                                        <input type="text" id="lto_int_rate_7" name="lto_int_rate_7" size="15" required>
                                    </td>
                                    <td>
                                        <input type="text" id="lto_current_balance_7" name="lto_current_balance_7" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="lto_monthly_payments_7" name="lto_monthly_payments_7" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="lto_pledge_collat_7" name="lto_pledge_collat_7" size="25">
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">8</th>
                                    <td nowrap>
                                        <input type="text" id="lto_name_credit_8" name="lto_name_credit_8" size="25" required>  
                                    </td>
                                    <td>
                                        <input type="text" id="lto_int_rate_8" name="lto_int_rate_8" size="15" required>
                                    </td>
                                    <td>
                                        <input type="text" id="lto_current_balance_8" name="lto_current_balance_8" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="lto_monthly_payments_8" name="lto_monthly_payments_8" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="lto_pledge_collat_8" name="lto_pledge_collat_8" size="25">
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">9</th>
                                    <td nowrap>
                                        <input type="text" id="lto_name_credit_9" name="lto_name_credit_9" size="25" required>  
                                    </td>
                                    <td>
                                        <input type="text" id="lto_int_rate_9" name="lto_int_rate_9" size="15" required>
                                    </td>
                                    <td>
                                        <input type="text" id="lto_current_balance_9" name="lto_current_balance_9" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="lto_monthly_payments_9" name="lto_monthly_payments_9" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="lto_pledge_collat_9" name="lto_pledge_collat_9" size="25">
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">10</th>
                                    <td>Total:</td>
                                    <td id="lto_current_balance_total" size="15"></td>
                                    <td id="lto_monthly_payments_total" size="15"></td>

                            </tbody>
                        </table>
                        <input type="submit" value="Submit">
                    </form>
                    <br/> 
                    <br/>    




                    <!-- Leases - Schedule #7.C -->      
                    <form method="post" id="business_scorecard_id" onsubmit="return checkBusinessName(); return checkForm()"  name="business_scorecard_id" action="business_scorecard_insert_preview.php">   
                        <table class="table" >
                            <thead class="thead-inverse">
                                <tr>
                                    <td colspan="6" align="center" bgcolor="#ccffcc">
                                        <strong>Leases</strong>
                                    </td>
                                </tr>
                            </thead>     

                            <tbody>  
                                <!--  Line 1  -->

                                <tr>
                                    <th></th>    
                                    <th align="center" nowrap>Name of Creditor</th>
                                    <th align="center">Interest Rate</th>
                                    <th align="center">Current Balance</th>
                                    <th align="center">Monthly Payments</th>
                                    <th align="center">Pledged Collateral</th>
                                </tr>

                                <tr>
                                    <th scope="row">1</th>
                                    <td nowrap>
                                        <input type="text" id="leases_name_credit_1" name="leases_name_credit_1" size="25" required>  
                                    </td>
                                    <td>
                                        <input type="text" id="leases_int_rate_1" name="leases_int_rate_1" size="15" required>
                                    </td>
                                    <td>
                                        <input type="text" id="leases_current_balance_1" name="leases_current_balance_limit_1" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="leases_monthly_payments_1" name="leases_monthly_payments_1" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="leases_pledge_collat_1" name="leases_pledge_collat_1" size="25">
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">2</th>
                                    <td nowrap>
                                        <input type="text" id="leases_name_credit_2" name="leases_name_credit_2" size="25" required>  
                                    </td>
                                    <td>
                                        <input type="text" id="leases_int_rate_2" name="leases_int_rate_2" size="15" required>
                                    </td>
                                    <td>
                                        <input type="text" id="leases_current_balance_2" name="leases_current_balance_2" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="leases_monthly_payments_2" name="leases_monthly_payments_2" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="leases_pledge_collat_2" name="leases_pledge_collat_2" size="25">
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">3</th>
                                    <td nowrap>
                                        <input type="text" id="leases_name_credit_3" name="leases_name_credit_3" size="25" required>  
                                    </td>
                                    <td>
                                        <input type="text" id="leases_int_rate_3" name="leases_int_rate_3" size="15" required>
                                    </td>
                                    <td>
                                        <input type="text" id="leases_current_balance_3" name="leases_current_balance_3" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="leases_monthly_payments_3" name="leases_monthly_payments_3" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="leases_pledge_collat_3" name="leases_pledge_collat_3" size="25">
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">4</th>
                                    <td nowrap>
                                        <input type="text" id="leases_name_credit_4" name="leases_name_credit_4" size="25" required>  
                                    </td>
                                    <td>
                                        <input type="text" id="leases_int_rate_4" name="leases_int_rate_4" size="15" required>
                                    </td>
                                    <td>
                                        <input type="text" id="leases_current_balance_4" name="leases_current_balance_4" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="leases_monthly_payments_4" name="leases_monthly_payments_4" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="leases_pledge_collat_4" name="leases_pledge_collat_4" size="25">
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">5</th>
                                    <td nowrap>
                                        <input type="text" id="leases_name_credit_5" name="leases_name_credit_5" size="25" required>  
                                    </td>
                                    <td>
                                        <input type="text" id="leases_int_rate_5" name="leases_int_rate_5" size="15" required>
                                    </td>
                                    <td>
                                        <input type="text" id="leases_current_balance_5" name="leases_current_balance_5" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="leases_monthly_payments_5" name="leases_monthly_payments_5" size="15">
                                    </td>
                                    <td>
                                        <input type="text" id="leases_pledge_collat_5" name="leases_pledge_collat_5" size="25">
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">6</th>
                                    <td>Total:</td>
                                    <td id="leases_current_balance_total" size="15"></td>
                                    <td id="leases_monthly_payments_total" size="15"></td>

                            </tbody>
                        </table>
                        <input type="submit" value="Submit">
                    </form>
                    <br/> 
                    <br/>    
                </div> 

                <!-- Graph for the users input -->
                <div class="col-md-4 col-md-offset-1">
                    <div style="border: 1px solid black; ">
                        <h2 style="text-align:center">Key Areas of Management</h2>
                        <canvas id="allCategories"></canvas>
                    </div>
                    <!-- class="col-md-5 col-md-offset-2" style="border: 1px solid black; "> -->
                    <div style="border: 1px solid black;">
                        <p style="-webkit-text-decoration-line: overline; /* Safari */
                                  text-decoration-line: overline;"></p>
                        <h2 style="text-align:center">Total Score</h2>
                        <canvas id="totalScore"></canvas>
                    </div>
                </div> 





                <!-- footers -->
                <?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

                <!-- Place any per-page javascript here -->

                <?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>
