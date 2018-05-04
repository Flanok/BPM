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
$id=$_GET['id'];
?>
<?php

echo "
        <div class='col-md-10 col-md-offset-1'> 
        <br/>
        <br/>
        <div style='display:flex'>
        <!--        Score Card-->
        <a class='btn btn-primary ' href='business_scorecard_business_list_by_date.php?id=$id' role='button'>Score Card History</a>
        <br/>

		<!--        Score Card-->
		<br/>
        <a class='btn btn-primary ' href='business_scorecard_insert.php?id=$id' role='button'>Insert Score Card</a>
        <br/>

        <!--        Data Log-->
        <br/>
        <a class='btn btn-primary ' href='bpm_data_log.php?id=$id' role='button'>Data Log</a>
        <br/>

        <!--        Assets Update-->
        <br/>
        <a class='btn btn-primary ' href='business_scorecard_current_assets.php?id=$id' role='button'>Insert Assets</a>
        <br/>

		<!--        Asset History-->
        <br/>
        <a class='btn btn-primary ' href='bpm_view_asset_history.php?id=$id' role='button'>View Asset History</a>
        <br/>

        <!--        Liabilities Update-->
        <br/>
        <a class='btn btn-primary ' href='business_scorecard_current_liabilities.php?id=$id' role='button'>Insert Liabilities</a>
        <br/>

		<!--        Liabilities History-->
        <br/>
        <a class='btn btn-primary ' href='bpm_view_liability_history.php?id=$id' role='button'>View Liability History</a>
</div>
		";

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
                <h1>Your Current Assets</h1>
                <div class="col-md-6 col-md-offset-3">              
                    <form method="post" action="bpm_business_info.php<?php echo"?id=$id"?>">
                        <input type="hidden" name="country" value="">
                        <table class="table" >
                            <thead class="thead-inverse">
                                <tr>
                                    <th></th>    
                                    <th>Company Name</th>
                                    <th colspan="3">Company Name.... pull from db </th>
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
                                        cash from db
                                    </td>
                                </tr>

                                <!--  Line 2  -->
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Checking</td>
                                    <td>
                                        checking
                                    </td>
                                </tr>

                                <!--  Line 3  -->
                                <tr>
                                    <th scope="row">3</th>
                                    <td>PayPal Account</td>
                                    <td>
                                        PayPal
                                    </td>
                                </tr>

                                <!--  Line 4  -->
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Payroll Account Balance</td>
                                    <td>
                                        Payroll
                                    </td>
                                </tr>

                                <!--  Line 5  -->
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Savings</td>
                                    <td>
                                        Savings
                                    </td>
                                </tr>

                                <!--  Line 6  -->
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Pre-paid accounts</td>
                                    <td>
                                        Pre
                                    </td>
                                </tr>

                                <!--  Line 7  -->
                                <tr>
                                    <th scope="row"></th>
                                    <td align="right"><strong>Total:</strong></td>
                                    <td>
                                        Cash n equiv
                                    </td>
                                    <td></td>
                                </tr>


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
                                        30 days ar
                                    </td>
                                </tr>

                                <!--  Line 2  -->
                                <tr>
                                    <th scope="row">2</th>
                                    <td>31-60 days</td>
                                    <td>
                                        3160
                                    </td>
                                </tr>

                                <!--  Line 3  -->
                                <tr>
                                    <th scope="row">3</th>
                                    <td>61-90 days</td>
                                    <td>
                                        6190
                                    </td>
                                </tr>

                                <!--  Line 4  -->
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Over 90 days</td>
                                    <td>
                                        90
                                    </td>
                                </tr>

                                <!--  Line 5  -->
                                <tr>
                                    <th scope="row"></th>
                                    <td align="right"><strong>Total:</strong></td>
                                    <td>
                                        Total
                                    </td>
                                    <td></td>
                                </tr>

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
                                        Supplies
                                    </td>
                                </tr>
                                <!--  Line 3  -->   
                                <tr>
                                    <th scope="row">2</th>
                                    <td nowrap>Miscellaneous</td>
                                    <td>
                                        Misc
                                    </td>
                                </tr>
                                <!--  Line 4  -->
                                <tr>
                                    <td></td>
                                    <td align="right"><strong>Total: </strong></td>
                                    <td>Tots</td>
                                </tr>
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
                                        Earned rr
                                    </td>
                                </tr>
                                <!--  Line 3  -->   
                                <tr>
                                    <th scope="row">2</th>
                                    <td nowrap>Current Portion Notes Rec.</td>
                                    <td>
                                        Curr port
                                    </td>
                                </tr>
                                <!--  Line 4  -->
                                <tr>
                                    <td></td>
                                    <td align="right"><strong>Total: </strong></td>
                                    <td>Tots</td>
                                </tr>
                            </tbody>
                        </table>    
                        <strong>Total Assets: Money</strong>
                        <br/>
                        <br/>
                        </div> 
                    <button type="submit">Back</button>                  
                    </form>

                <!-- footers -->
                <?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

                <!-- Place any per-page javascript here -->

                <?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>
