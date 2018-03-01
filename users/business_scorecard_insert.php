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

<?php if (!securePage($_SERVER['PHP_SELF'])){die();} ?>

<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
					<h1>This is the main content section</h1>
                
                



                
<div class="col-md-5 col-md-offset-1">              
<form method="post" id="business_scorecard_id" onsubmit="return checkForm()"  name="business_scorecard_id" action="business_scorecard_insert_preview.php">
<input type="hidden" name="country" value="">
<table class="table table-striped">
  <thead class="thead-inverse">
    <tr>
      <th></th>    
      <th>Company Name</th>
        <th colspan="3"><input type="text" id="company_name" name="company_name" size="40" required> </th>
      <th colspan="2" id="company_name_required" style="color:red">Required Entry</th>
    </tr>
      <tr>
      <th></th>    
      <th>Date</th>
      <th><p>
          <?php 
          date_default_timezone_set("America/Boise");
          echo date('Y/M/d') . " " . date('h:i:sa') . " MST"
          ?>
          </p></th>
    </tr> 
    <tr>
      <th></th>    
      <th>Key Areas of Management</th>
      <th>Weight</th>
      <th>Grade</th>
      <th>Score</th>
      <th>Score Potential</th>
      <th>Below Potential</th>
    </tr>
  </thead>
                    
                    
<!--  Insert data to be used in the javascript below.  -->                    

<tbody>
    
<!--  Line 1  -->
    <tr>
      <th scope="row">1</th>
      <td>Business Experience</td>
      <td>
          <select id="experience_weight" name="experience_weight" onchange="manageAreas('experience'); total1()">
              <option value="0.00">0.00</option>
              <option value="0.25">0.25</option>
              <option value="0.50">0.50</option>
              <option value="0.75">0.75</option>
              <option value="1.00">1.00</option>
              <option value="1.25">1.25</option>
              <option value="1.50">1.50</option>
              <option value="1.75">1.75</option>
              <option value="2.00">2.00</option>
          </select>
          <!--
          <input type="text" id="experience_weight" name="experience_weight" onclick="changeValue('')" onkeyup="manageAreas('experience'); total1()"  size="5">  
          -->
      </td>
      
      <td>
          <select id="experience_grade" name="experience_grade" onchange="manageAreas('experience'); total1()">
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
          </select>
          <!--
          <input type="text" id="experience_grade" name="experience_grade" onkeyup="manageAreas('experience'); total1()" size="5">  
          -->
      </td>
      
      <td><p id="experience_score"></p></td>
      <td><p id="experience_score_potential"></p></td>
      <td><p id="experience_below_potential"></p></td>
    </tr>
    
<!--  Line 2  -->
    <tr>
      <th scope="row">2</th>
      <td>Economic Model</td>
      <td>
          <select id="economic_weight" name="economic_weight" onchange="manageAreas('economic'); total1()">
              <option value="0.00">0.00</option>
              <option value="0.25">0.25</option>
              <option value="0.50">0.50</option>
              <option value="0.75">0.75</option>
              <option value="1.00">1.00</option>
              <option value="1.25">1.25</option>
              <option value="1.50">1.50</option>
              <option value="1.75">1.75</option>
              <option value="2.00">2.00</option>
          </select>
          <!--
          <input type="text" id="economic_weight" name="economic_weight" onkeyup="manageAreas('economic'); total1()" size="5"> 
          -->
      </td>
      <td>
          <select id="economic_grade" name="economic_grade" onchange="manageAreas('economic'); total1()">
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
          </select>
          <!--
          <input type="text" id="economic_grade" name="economic_grade" onkeyup="manageAreas('economic'); total1()" size="5">  
          -->
      </td>
      <td><p id="economic_score"></p></td>
      <td><p id="economic_score_potential"></p></td>
      <td><p id="economic_below_potential"></p></td>
    </tr>
    
<!--  Line 3  -->    
    <tr>
      <th scope="row">3</th>
      <td>Working Capital</td>
      <td>
          <select id="capital_weight" name="capital_weight" onchange="manageAreas('capital'); total1()">
              <option value="0.00">0.00</option>
              <option value="0.25">0.25</option>
              <option value="0.50">0.50</option>
              <option value="0.75">0.75</option>
              <option value="1.00">1.00</option>
              <option value="1.25">1.25</option>
              <option value="1.50">1.50</option>
              <option value="1.75">1.75</option>
              <option value="2.00">2.00</option>
          </select>
          <!--
          <input type="text" id="capital_weight" name="capital_weight" onkeyup="manageAreas('capital'); total1()" size="5"> 
          -->
        </td>
      <td>
          <select id="capital_grade" name="capital_grade" onchange="manageAreas('capital'); total1()">
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
          </select>
          <!--
          <input type="text" id="capital_grade" name="capital_grade" onkeyup="manageAreas('capital'); total1()" size="5"> 
          -->
      </td>
      <td><p id="capital_score"></p></td>
      <td><p id="capital_score_potential"></p></td>
      <td><p id="capital_below_potential"></p></td>
    </tr>
     
<!--  Line 4  -->
    <tr>
      <th scope="row">4</th>
      <td>Employees</td>
      <td>
          <select id="employees_weight" name="employees_weight" onchange="manageAreas('employees'); total1()">
              <option value="0.00">0.00</option>
              <option value="0.25">0.25</option>
              <option value="0.50">0.50</option>
              <option value="0.75">0.75</option>
              <option value="1.00">1.00</option>
              <option value="1.25">1.25</option>
              <option value="1.50">1.50</option>
              <option value="1.75">1.75</option>
              <option value="2.00">2.00</option>
          </select>
          <!--
          <input type="text" id="employees_weight" name="employees_weight" onkeyup="manageAreas('employees'); total1()" size="5"> 
          -->
        </td>
      <td>
          <select id="employees_grade" name="employees_grade" onchange="manageAreas('employees'); total1()">
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
          </select>
          <!--
          <input type="text" id="employees_grade" name="employees_grade" onkeyup="manageAreas('employees'); total1()" size="5">  
          -->
</td>
      <td><p id="employees_score"></p></td>
      <td><p id="employees_score_potential"></p></td>
      <td><p id="employees_below_potential"></p></td>
    </tr>

<!--  Line 5  -->
    <tr>
      <th scope="row">5</th>
      <td>Business Relationships</td>
      <td>
          <select id="relationships_weight" name="relationships_weight" onchange="manageAreas('relationships'); total1()">
              <option value="0.00">0.00</option>
              <option value="0.25">0.25</option>
              <option value="0.50">0.50</option>
              <option value="0.75">0.75</option>
              <option value="1.00">1.00</option>
              <option value="1.25">1.25</option>
              <option value="1.50">1.50</option>
              <option value="1.75">1.75</option>
              <option value="2.00">2.00</option>
          </select>
          <!--
          <input type="text" id="relationships_weight" name="relationships_weight" onkeyup="manageAreas('relationships'); total1()" size="5"> 
          -->
        </td>
      <td>
          <select id="relationships_grade" name="relationships_grade" onchange="manageAreas('relationships'); total1()">
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
          </select>
          <!--
          <input type="text" id="relationships_grade" name="relationships_grade" onkeyup="manageAreas('relationships'); total1()" size="5">  
          -->
</td>
      <td><p id="relationships_score"></p></td>
      <td><p id="relationships_score_potential"></p></td>
      <td><p id="relationships_below_potential"></p></td>
    </tr>
 
<!--  Line 6  -->
    <tr>
      <th scope="row">6</th>
      <td>Capital Assets</td>
      <td>
          <select id="assets_weight" name="assets_weight" onchange="manageAreas('assets'); total1()">
              <option value="0.00">0.00</option>
              <option value="0.25">0.25</option>
              <option value="0.50">0.50</option>
              <option value="0.75">0.75</option>
              <option value="1.00">1.00</option>
              <option value="1.25">1.25</option>
              <option value="1.50">1.50</option>
              <option value="1.75">1.75</option>
              <option value="2.00">2.00</option>
          </select>
          <!--
          <input type="text" id="assets_weight" name="assets_weight" onkeyup="manageAreas('assets'); total1()" size="5"> 
          -->
        </td>
      <td>
          <select id="assets_grade" name="assets_grade" onchange="manageAreas('assets'); total1()">
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
          </select>
          <!--
          <input type="text" id="assets_grade" name="assets_grade" onkeyup="manageAreas('assets'); total1()" size="5">  
          -->
</td>
      <td><p id="assets_score"></p></td>
      <td><p id="assets_score_potential"></p></td>
      <td><p id="assets_below_potential"></p></td>
    </tr>

<!--  Line 7  -->
    <tr>
      <th scope="row">7</th>
      <td>Marketing</td>
      <td>
          <select id="marketing_weight" name="marketing_weight" onchange="manageAreas('marketing'); total1()">
              <option value="0.00">0.00</option>
              <option value="0.25">0.25</option>
              <option value="0.50">0.50</option>
              <option value="0.75">0.75</option>
              <option value="1.00">1.00</option>
              <option value="1.25">1.25</option>
              <option value="1.50">1.50</option>
              <option value="1.75">1.75</option>
              <option value="2.00">2.00</option>
          </select>
          <!--
          <input type="text" id="marketing_weight" name="marketing_weight" onkeyup="manageAreas('marketing'); total1()" size="5"> 
          -->
        </td>
      <td>
          <select id="marketing_grade" name="marketing_grade" onchange="manageAreas('marketing'); total1()">
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
          </select>
          <!--
          <input type="text" id="marketing_grade" name="marketing_grade" onkeyup="manageAreas('marketing'); total1()" size="5">  
          -->
</td>
      <td><p id="marketing_score"></p></td>
      <td><p id="marketing_score_potential"></p></td>
      <td><p id="marketing_below_potential"></p></td>
    </tr>

<!--  Line 8  -->
    <tr>
      <th scope="row">8</th>
      <td>Managing Debt</td>
      <td>
          <select id="debt_weight" name="debt_weight" onchange="manageAreas('debt'); total1()">
              <option value="0.00">0.00</option>
              <option value="0.25">0.25</option>
              <option value="0.50">0.50</option>
              <option value="0.75">0.75</option>
              <option value="1.00">1.00</option>
              <option value="1.25">1.25</option>
              <option value="1.50">1.50</option>
              <option value="1.75">1.75</option>
              <option value="2.00">2.00</option>
          </select>
          <!--
          <input type="text" id="debt_weight" name="debt_weight" onkeyup="manageAreas('debt'); total1()" size="5"> 
          -->
        </td>
      <td>
          <select id="debt_grade" name="debt_grade" onchange="manageAreas('debt'); total1()">
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
          </select>
          <!--
          <input  type="text" id="debt_grade" name="debt_grade" onkeyup="manageAreas('debt'); total1()" size="5">  
          -->
</td>
      <td><p id="debt_score"></p></td>
      <td><p id="debt_score_potential"></p></td>
      <td><p id="debt_below_potential"></p></td>
    </tr>
   
<!--  Line 9  -->
    <tr>
      <th scope="row">9</th>
      <td>Managing Receivables and Payables</td>
      <td>
          <select id="rec_pay_weight" name="rec_pay_weight" onchange="manageAreas('rec_pay'); total1()">
              <option value="0.00">0.00</option>
              <option value="0.25">0.25</option>
              <option value="0.50">0.50</option>
              <option value="0.75">0.75</option>
              <option value="1.00">1.00</option>
              <option value="1.25">1.25</option>
              <option value="1.50">1.50</option>
              <option value="1.75">1.75</option>
              <option value="2.00">2.00</option>
          </select>
          <!--
          <input type="text" id="rec_pay_weight" name="rec_pay_weight" onkeyup="manageAreas('rec_pay'); total1()" size="5"> 
          -->
        </td>
      <td>
          <select id="rec_pay_grade" name="rec_pay_grade" onchange="manageAreas('rec_pay'); total1()">
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
          </select>
          <!--
          <input type="text" id="rec_pay_grade" name="rec_pay_grade" onkeyup="manageAreas('rec_pay'); total1()" size="5">  
          -->
</td>
      <td><p id="rec_pay_score"></p></td>
      <td><p id="rec_pay_score_potential"></p></td>
      <td><p id="rec_pay_below_potential"></p></td>
    </tr>
 
<!--  Line 10  -->    
    <tr>
      <th scope="row">10</th>
      <td>Cash Controls</td>
      <td>
          <select id="cash_weight" name="cash_weight" onchange="manageAreas('cash'); total1()">
              <option value="0.00">0.00</option>
              <option value="0.25">0.25</option>
              <option value="0.50">0.50</option>
              <option value="0.75">0.75</option>
              <option value="1.00">1.00</option>
              <option value="1.25">1.25</option>
              <option value="1.50">1.50</option>
              <option value="1.75">1.75</option>
              <option value="2.00">2.00</option>
          </select>
          <!--
          <input type="text" id="cash_weight" name="cash_weight" onkeyup="manageAreas('cash'); total1()" size="5"> 
          -->
        </td>
      <td>
          <select id="cash_grade" name="cash_grade" onchange="manageAreas('cash'); total1()">
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
          </select>
          <!--
          <input type="text" id="cash_grade" name="cash_grade" onkeyup="manageAreas('cash'); total1()" size="5">  
          -->
</td>
      <td style="border-bottom: 1px solid #000"><p id="cash_score"></p></td>
      <td style="border-bottom: 1px solid #000"><p id="cash_score_potential"></p></td>
      <td style="border-bottom: 1px solid #000"><p id="cash_below_potential"></p></td>
    </tr>
    
    <!--  Line 11  -->    

    <tr>
      <th scope="row">11</th>
      <td>Total <p id="total_directions" style="float: right; font-size:12px">(The weight total should always equal 10)</p></td>
      <td style="border-bottom: 3px double #000"><p id="total_weight"></p></td>
      <td><p></p></td>
      <td style="border-bottom: 3px double #000"><p id="total_score"></p></td>
      <td style="border-bottom: 3px double #000"><p id="total_score_potential"></p></td>
      <td style="border-bottom: 3px double #000"><p id="total_below_potential"></p></td>
    </tr>

  </tbody>
</table>
    <input type="submit" value="Submit">
</form>
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


<script src="business_scorecard_functions/check_form.js"></script>
<script src="business_scorecard_functions/get_current_date.js"></script>
<script src="business_scorecard_functions/manage_areas.js"></script>
<script src="business_scorecard_functions/total.js"></script>
<script src="business_scorecard_functions/graph_me.js"></script>
<script src="business_scorecard_functions/all_categories_and_total_graphs.js"></script>

<script>
    
// Get the current date  
getCurrentDate();

// Validate business name and that the total is equal to 10    
checkForm();    
    
// validate and calculate the total is equal to 10
manageAreas(userInput);

/****************************************************************
* Show red total if not equal to 10 and
* calculate total_score/total_score_potential/total_below_potential
****************************************************************/
total1();

/****************************************************************
* Brings the values about, but is only needed for the updating of 
* the information, so it shouldn't be needed on this page
* manageAreasOnLoad();
****************************************************************/

//get input values
graphMe(topic_name); 
                     
</script> 
              
<!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->

<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>
