function checkForm() {

    var weight_1 = parseFloat(document.getElementById("experience_weight").value) || 0;
    var weight_2 = parseFloat(document.getElementById("economic_weight").value) || 0;
    var weight_3 = parseFloat(document.getElementById("capital_weight").value) || 0;
    var weight_4 = parseFloat(document.getElementById("employees_weight").value) || 0;
    var weight_5 = parseFloat(document.getElementById("relationships_weight").value) || 0;
    var weight_6 = parseFloat(document.getElementById("assets_weight").value) || 0;
    var weight_7 = parseFloat(document.getElementById("marketing_weight").value) || 0;
    var weight_8 = parseFloat(document.getElementById("debt_weight").value) || 0;
    var weight_9 = parseFloat(document.getElementById("rec_pay_weight").value) || 0;
    var weight_10 = parseFloat(document.getElementById("cash_weight").value) || 0;

    var total_wt = parseFloat(weight_1 + weight_2 + weight_3 + weight_4 + weight_5 + weight_6 + weight_7 + weight_8 + weight_9 + weight_10);
    
    var company_name = document.getElementById("company_name").value;
    
    if( company_name.charAt(0) == " " || company_name == " "){
    alert('The first character can not be a space for the company name.');
          return false;
          }
    else if (total_wt == 10){
        document.forms['business_scorecard_id'].submit();
      }else{
            alert('Total must equal 10 to submit.');
            return false;
           }

    }

    
/************************************************************************
This is possible code for when a user needs to input their own values
function weight(num1){
        x = document.getElementById(num1).value;
        if (x < 0 || x > 10){
            alert("Value must be between 0-10.");
            document.getElementById(num1).value = "";
        }
    return x;
}    
    
function grade(num2){ 
    y = document.getElementById(num2).value;
        if (y < 0 || y > 10){
            alert("Value must be between 0-10.");
            document.getElementById(num2).value = "";
        }
    return y;
}    
function experience(){
    function weight(num1);
    function grade(num2);
    document.getElementById("experience_score").innerHTML = x*y;
    document.getElementById("experience_score_potential").innerHTML = x*10;
    document.getElementById("experience_below_potential").innerHTML = (x*10)-(x*y);
    }
***************************************************************************/  