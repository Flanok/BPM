<?php
require_once 'bpm_individual_biz_nav_tabs.php';
?>

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
                <h1>This is the Other Current Liabilities Page</h1>

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
                                <tr><th colspan="3"><strong style="color:red">&nbsp The business name needs to carry on from the first page of the assets</strong> </th></tr>
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

                            </thead>                   
                        </table>  



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
