function manageAreas(userInput) {
    var topic_name = userInput;
    var x = document.getElementById(topic_name + "_weight").value;
    var y = document.getElementById(topic_name + "_grade").value;
    document.getElementById(topic_name + "_score").innerHTML = (x*y).toFixed(2);
    document.getElementById(topic_name + "_score_potential").innerHTML = (x*10).toFixed(2);
    document.getElementById(topic_name + "_below_potential").innerHTML = ((x*10)-(x*y)).toFixed(2);
    
    
    /**************************************************
    THIS CODE IS FOR USER INPUT RATHER THAN DROP DOWN ITEMS
    if (x == "."){
        x = "0.";
    }
    if (x < 0 || x > 2 || isNaN(x)){
        alert("Value must be between 0-10.")
        document.getElementById(topic_name + "_weight").value = "";
    }
    else{
        document.getElementById(topic_name + "_weight").value = x;
        var y = document.getElementById(topic_name + "_grade").value;
        if (y < 0 || y > 10 || isNaN(y) || y % 1 !== 0){
        alert("Value must have no decimal places and be between 0-10.")
        document.getElementById(topic_name + "_grade").value = "";
        }
        else{
            document.getElementById(topic_name + "_score").innerHTML = (x*y).toFixed(2);
            document.getElementById(topic_name + "_score_potential").innerHTML = (x*10).toFixed(2);
            document.getElementById(topic_name + "_below_potential").innerHTML = ((x*10)-(x*y)).toFixed(2);
        }
    }
    ****************************************************/
    graphMe(topic_name);
}