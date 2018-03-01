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
					<h1>This is the Current Assets Page</h1>
                                
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

  </thead>   
    </table>
<br/> 
<br/>
  
<!-- Inventory - Schedule #3 -->      
<form method="post" id="business_scorecard_id" onsubmit="return checkBusinessName(); return checkForm()"  name="business_scorecard_id" action="business_scorecard_insert_preview.php">   
<table class="table" >
  <thead class="thead-inverse">
    <tr>
        <td colspan="5" align="center" bgcolor="#ccffcc">
            <strong>Inventory</strong>
        </td>
    </tr>
    <tr>
        <td colspan="5" align="center"><strong>How is Inventory Valued? &nbsp</strong>   
            <input type="radio" name="gender" value="cost"> Cost &nbsp
            <input type="radio" name="gender" value="fair_market"> Fair Market
        </td>
    </tr> 
  </thead>     

<tbody>  
<!--  Line 1  -->
    
    <tr>
      <th></th>    
      <th align="center" nowrap>Standard Categories</th>
      <th align="center">Value</th>
      <th></th>
      <th align="center">Notes</th>
    </tr>
<!--  Line 2  -->  
    <tr>
      <th scope="row">1</th>
      <td nowrap>Supplies</td>
      <td>
          <input type="text" id="supplies_value" name="supplies_value" size="15" required>
      </td>
      <td></td>
      <td>
          <input type="text" id="supplies_notes" name="supplies_notes" size="60" required>
      </td>
    </tr>
 <!--  Line 3  -->   
    <tr>
      <th scope="row">2</th>
      <td nowrap>Miscellaneous</td>
      <td>
          <input type="text" id="miscellaneous_value" name="miscellaneous_value" size="15" required>
      </td>
      <td></td>
      <td>
          <input type="text" id="miscellaneous_notes" name="miscellaneous_notes" size="60" required>
      </td>
    </tr>
<!--  Line 4  -->
    <tr>
        <td><br></td>
        <td></td>
        <td></td>
    </tr>
<!--  Line 5  -->
    <tr>
      <th></th>    
      <th align="center" nowrap>Specific Inventory Categories</th>
      <th align="center">Value</th>
      <th></th>
      <th align="center">Notes</th>
    </tr>
<!--  Line 6  -->
    <tr>
      <th scope="row">3</th>
      <td nowrap><input type="text" id="value_option_1_title" name="value_option_1_title" size="25" required></td>
      <td>
          <input type="text" id="value_option_1_value" name="value_option_1_value" size="15" required>
      </td>
      <td></td>
      <td>
          <input type="text" id="value_option_1_notes" name="value_option_1_notes" size="60" required>
      </td>
    </tr>
<!--  Line 7  -->  
    <tr>
      <th scope="row">4</th>
      <td nowrap><input type="text" id="value_option_2_title" name="value_option_2_title" size="25" required></td>
      <td>
          <input type="text" id="value_option_2_value" name="value_option_2_value" size="15" required>
      </td>
      <td></td>
      <td>
          <input type="text" id="value_option_2_notes" name="value_option_2_notes" size="60" required>
      </td>
    </tr>
<!--  Line 8  -->
    <tr>
      <th scope="row">5</th>
      <td nowrap><input type="text" id="value_option_3_title" name="value_option_3_title" size="25" required></td>
      <td>
          <input type="text" id="value_option_3_value" name="value_option_3_value" size="15" required>
      </td>
      <td></td>
      <td>
          <input type="text" id="value_option_3_notes" name="value_option_3_notes" size="60" required>
      </td>
    </tr>
<!--  Line 9  -->
    <tr>
      <th scope="row">6</th>
      <td nowrap><input type="text" id="value_option_4_title" name="value_option_4__title" size="25" required></td>
      <td>
          <input type="text" id="value_option_4_value" name="value_option_4_value" size="15" required>
      </td>
      <td></td>
      <td>
          <input type="text" id="value_option_4_notes" name="value_option_4_notes" size="60" required>
      </td>
    </tr>
<!--  Line 10  -->
    <tr>
      <th scope="row">7</th>
      <td nowrap><input type="text" id="value_option_5_title" name="value_option_5_title" size="25" required></td>
      <td>
          <input type="text" id="value_option_5_value" name="value_option_5_value" size="15" required>
      </td>
      <td></td>
      <td>
          <input type="text" id="value_option_5_notes" name="value_option_5_notes" size="60" required>
      </td>
    </tr>
<!--  Line 11  -->
    <tr>
      <th scope="row">8</th>
      <td nowrap><input type="text" id="value_option_6_title" name="value_option_6_title" size="25" required></td>
      <td>
          <input type="text" id="value_option_6_value" name="value_option_6_value" size="15" required>
      </td>
      <td></td>
      <td>
          <input type="text" id="value_option_6_notes" name="value_option_6_notes" size="60" required>
      </td>
    </tr>
<!--  Line 12  -->
    <tr>
      <th scope="row">9</th>
      <td nowrap><input type="text" id="value_option_7_title" name="value_option_7_title" size="25" required></td>
      <td>
          <input type="text" id="value_option_7_value" name="value_option_7_value" size="15" required>
      </td>
      <td></td>
      <td>
          <input type="text" id="value_option_7_notes" name="value_option_7_notes" size="60" required>
      </td>
    </tr>
<!--  Line 13  --> 
    <tr>
      <th scope="row">10</th>
      <td nowrap><input type="text" id="value_option_8_title" name="value_option_8_title" size="25" required></td>
      <td>
          <input type="text" id="value_option_8_value" name="value_option_8_value" size="15" required>
      </td>
      <td></td>
      <td>
          <input type="text" id="value_option_8_notes" name="value_option_8_notes" size="60" required>
      </td>
    </tr>
<!--  Line 14  -->
    <tr>
        <td></td>
        <td align="right"><strong>Total: </strong></td>
        <td><p id="total"></p></td>
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
