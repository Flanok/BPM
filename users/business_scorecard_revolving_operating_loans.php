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
