function graphMe(topic_name){

var experience_weight = document.getElementById("experience_weight").value;
var economic_weight = document.getElementById("economic_weight").value;
var capital_weight = document.getElementById("capital_weight").value;
var employees_weight = document.getElementById("employees_weight").value;
var relationships_weight = document.getElementById("relationships_weight").value;
var assets_weight = document.getElementById("assets_weight").value;
var marketing_weight = document.getElementById("marketing_weight").value;
var debt_weight = document.getElementById("debt_weight").value;    
var rec_pay_weight = document.getElementById("rec_pay_weight").value;
var cash_weight = document.getElementById("cash_weight").value; 

var experience_grade = document.getElementById("experience_grade").value;
var economic_grade = document.getElementById("economic_grade").value;
var capital_grade = document.getElementById("capital_grade").value;
var employees_grade = document.getElementById("employees_grade").value;
var relationships_grade = document.getElementById("relationships_grade").value;
var assets_grade = document.getElementById("assets_grade").value;
var marketing_grade = document.getElementById("marketing_grade").value;
var debt_grade = document.getElementById("debt_grade").value;    
var rec_pay_grade = document.getElementById("rec_pay_grade").value;
var cash_grade = document.getElementById("cash_grade").value; 

var experience_score = experience_weight * experience_grade;
var economic_score = economic_weight * economic_grade;    
var capital_score = capital_weight * capital_grade;
var employees_score = employees_weight * employees_grade; 
var relationships_score = relationships_weight * relationships_grade;
var assets_score = assets_weight * assets_grade; 
var marketing_score = marketing_weight * marketing_grade;
var debt_score = debt_weight * debt_grade;
var rec_pay_score = rec_pay_weight * rec_pay_grade;
var cash_score = cash_weight * cash_grade; 
    
var experience_potential = (experience_weight * 10 - experience_score);
var economic_potential = (economic_weight * 10 - economic_score);    
var capital_potential = (capital_weight * 10 - capital_score);
var employees_potential = (employees_weight * 10 - employees_score); 
var relationships_potential = (relationships_weight * 10 - relationships_score);
var assets_potential = (assets_weight * 10 - assets_score); 
var marketing_potential = (marketing_weight * 10 - marketing_score);
var debt_potential = (debt_weight * 10 - debt_score);
var rec_pay_potential = (rec_pay_weight * 10 - rec_pay_score);
var cash_potential = (cash_weight * 10 - cash_score);  

var total_score = (experience_score + economic_score + capital_score + employees_score + relationships_score + assets_score + marketing_score + debt_score + rec_pay_score + cash_score);  
    
var score_potential = (experience_potential + economic_potential + capital_potential + employees_potential + relationships_potential + assets_potential + marketing_potential + debt_potential + rec_pay_potential + cash_potential);
    
allCategories.data.datasets[0].data[0] = experience_score;
allCategories.data.datasets[0].data[1] = economic_score;    
allCategories.data.datasets[0].data[2] = capital_score;
allCategories.data.datasets[0].data[3] = employees_score; 
allCategories.data.datasets[0].data[4] = relationships_score;
allCategories.data.datasets[0].data[5] = assets_score; 
allCategories.data.datasets[0].data[6] = marketing_score;
allCategories.data.datasets[0].data[7] = debt_score;
allCategories.data.datasets[0].data[8] = rec_pay_score;
allCategories.data.datasets[0].data[9] = cash_score; 
    
allCategories.data.datasets[1].data[0] = experience_potential;
allCategories.data.datasets[1].data[1] = economic_potential;    
allCategories.data.datasets[1].data[2] = capital_potential;
allCategories.data.datasets[1].data[3] = employees_potential; 
allCategories.data.datasets[1].data[4] = relationships_potential;
allCategories.data.datasets[1].data[5] = assets_potential; 
allCategories.data.datasets[1].data[6] = marketing_potential;
allCategories.data.datasets[1].data[7] = debt_potential;
allCategories.data.datasets[1].data[8] = rec_pay_potential;
allCategories.data.datasets[1].data[9] = cash_potential; 

totalScore.data.datasets[0].data[0] = total_score;
totalScore.data.datasets[1].data[0] = score_potential;


totalScore.update();  
allCategories.update();
}



//get input values from database
function graphMe_php(topic_name){

var experience_weight =     parseFloat("<?php echo $experience_weight  ?>");
var economic_weight =       parseFloat("<?php echo $economic_weight    ?>");
var capital_weight =        parseFloat("<?php echo $capital_weight     ?>");
var employees_weight =      parseFloat("<?php echo $employees_weight   ?>");
var relationships_weight =  parseFloat("<?php echo $relations_weight   ?>");
var assets_weight =         parseFloat("<?php echo $assets_weight      ?>");
var marketing_weight =      parseFloat("<?php echo $marketing_weight   ?>");
var debt_weight =           parseFloat("<?php echo $debt_weight        ?>");    
var rec_pay_weight =        parseFloat("<?php echo $rec_pay_weight     ?>");
var cash_weight =           parseFloat("<?php echo $cash_weight        ?>"); 

var experience_grade =      parseFloat("<?php echo $experience_grade   ?>");
var economic_grade =        parseFloat("<?php echo $economic_grade     ?>");
var capital_grade =         parseFloat("<?php echo $capital_grade      ?>");
var employees_grade =       parseFloat("<?php echo $employees_grade    ?>");
var relationships_grade =   parseFloat("<?php echo $relations_grade    ?>");
var assets_grade =          parseFloat("<?php echo $assets_grade       ?>");
var marketing_grade =       parseFloat("<?php echo $marketing_grade    ?>");
var debt_grade =            parseFloat("<?php echo $debt_grade         ?>");    
var rec_pay_grade =         parseFloat("<?php echo $rec_pay_grade      ?>");
var cash_grade =            parseFloat("<?php echo $cash_grade         ?>"); 

var experience_score = experience_weight * experience_grade;
var economic_score = economic_weight * economic_grade;    
var capital_score = capital_weight * capital_grade;
var employees_score = employees_weight * employees_grade; 
var relationships_score = relationships_weight * relationships_grade;
var assets_score = assets_weight * assets_grade; 
var marketing_score = marketing_weight * marketing_grade;
var debt_score = debt_weight * debt_grade;
var rec_pay_score = rec_pay_weight * rec_pay_grade;
var cash_score = cash_weight * cash_grade; 
    
var experience_potential = (experience_weight * 10 - experience_score);
var economic_potential = (economic_weight * 10 - economic_score);    
var capital_potential = (capital_weight * 10 - capital_score);
var employees_potential = (employees_weight * 10 - employees_score); 
var relationships_potential = (relationships_weight * 10 - relationships_score);
var assets_potential = (assets_weight * 10 - assets_score); 
var marketing_potential = (marketing_weight * 10 - marketing_score);
var debt_potential = (debt_weight * 10 - debt_score);
var rec_pay_potential = (rec_pay_weight * 10 - rec_pay_score);
var cash_potential = (cash_weight * 10 - cash_score);  

var total_score = (experience_score + economic_score + capital_score + employees_score + relationships_score + assets_score + marketing_score + debt_score + rec_pay_score + cash_score);    
    
var score_potential = (experience_potential + economic_potential + capital_potential + employees_potential + relationships_potential + assets_potential + marketing_potential + debt_potential + rec_pay_potential + cash_potential + total_score);
    
allCategories.data.datasets[0].data[0] = experience_score;
allCategories.data.datasets[0].data[1] = economic_score;    
allCategories.data.datasets[0].data[2] = capital_score;
allCategories.data.datasets[0].data[3] = employees_score; 
allCategories.data.datasets[0].data[4] = relationships_score;
allCategories.data.datasets[0].data[5] = assets_score; 
allCategories.data.datasets[0].data[6] = marketing_score;
allCategories.data.datasets[0].data[7] = debt_score;
allCategories.data.datasets[0].data[8] = rec_pay_score;
allCategories.data.datasets[0].data[9] = cash_score; 
    
allCategories.data.datasets[1].data[0] = experience_potential;
allCategories.data.datasets[1].data[1] = economic_potential;    
allCategories.data.datasets[1].data[2] = capital_potential;
allCategories.data.datasets[1].data[3] = employees_potential; 
allCategories.data.datasets[1].data[4] = relationships_potential;
allCategories.data.datasets[1].data[5] = assets_potential; 
allCategories.data.datasets[1].data[6] = marketing_potential;
allCategories.data.datasets[1].data[7] = debt_potential;
allCategories.data.datasets[1].data[8] = rec_pay_potential;
allCategories.data.datasets[1].data[9] = cash_potential; 

totalScore.data.datasets[0].data[0] = total_score;
totalScore.data.datasets[1].data[0] = score_potential;


totalScore.update();  
allCategories.update();
}    