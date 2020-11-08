function getHistory(){
    return document.getElementById("s_history-value").innerText;
}
function printHistory(num){
    document.getElementById("s_history-value").innerText=num;
}
function getOutput(){
    return document.getElementById("s_output-value").innerText;
}
function getFormattedNumber(num){
    var n = Number(num);
    return n.toLocaleString("en");
}
function printOutput(num){
    if (num==""){
        document.getElementById("s_output-value").innerText=num;
    }
    else{
        document.getElementById("s_output-value").innerText= getFormattedNumber(num);
    }
}
function reverseNumberFormat(num){
	return Number(num.replace(/,/g,''));
}

function Factorial(n) { 
            if (n === 0) {  
                return 1;  
            } 
            else {  
                return n * Factorial( n - 1 );  
            } 
        } 

var check = 0;
if (getOutput == "" && getHistory == ""){
    check = 0;
}

var operators = document.getElementsByClassName("s_operator");
for (var i=0; i<operators.length; i++){
    operators[i].addEventListener('click', function(){
        
        if (this.id == "clear"){
            printHistory("");
            printOutput("");
        }
        else if (this.id == "backspace"){
            var output = reverseNumberFormat(getOutput()).toString();
            if (output){
                output = output.substr(0, output.length-1);
                printOutput(output);
            }
        }
        else if ((this.id == "!" || this.id == "**" || this.id == "=")
        && !(getHistory().indexOf("cos")>=0 || getHistory().indexOf("tan")>=0
        || getHistory().indexOf("sin")>=0 || getHistory().indexOf("log")>=0 || 
        getHistory().indexOf("exp")>=0)){


            var output = getOutput();
            var history = getHistory();
            if(output == "" && history != "" ){
                
                if (history.indexOf("!")>0){

                    var numbers = history.split("!");
                    var temp = 1;
                    for (var i=0; i<numbers.length; i++){
                        
                        if (numbers[i] !="") {
                            temp *= Factorial(numbers[i]);
                        }
                    }
                    check = 1;
                    printOutput(temp);
                    printHistory("");
                }

				// if(isNaN(history[history.length-1])){
				// 	history= history.substr(0,history.length-1);
				// }
			}

            else if (output != "" || history != "") {
                output = output==""?output:reverseNumberFormat(output);
                
                history = history+output;
                if (this.id == "="){
                    if (history.indexOf("**")>0){
                        var result = eval(history);
                    }
                    printOutput(result);
                    printHistory("");
                    check = 1;
                } 
                else{
                    history = history+this.id;
                    printHistory(history);
                    printOutput("");
                }
            }
            
        }
        if((this.id == "cos" || this.id == "tan" || this.id == "sin"
        || this.id == "log" || this.id == "exp" || this.id == "=") && check == 0
        ){

            var output = getOutput();
            var history = getHistory();
            if (this.id == "="){

                history = history.split("(");
                var temp = 1;
                var i = history.length-1;

                while(i>0){
                    if (history[i-1] == "cos") temp = Math.cos(history[i]*temp);
                    if (history[i-1] == "sin") temp = Math.sin(history[i]*temp);
                    if (history[i-1] == "tan") temp = Math.tan(history[i]*temp);
                    if (history[i-1] == "log") temp = Math.log(history[i]*temp);
                    if (history[i-1] == "exp") temp = Math.exp(history[i]*temp);
                
                    i = i-2;
                }
                printOutput(temp);
                printHistory("");
            }
            else{
                if (history == ""){
                    printHistory(this.id+"(");
                }
                else printHistory(history + "(" + this.id+"(");
                printOutput("");
            }

        }
    });
}
var number = document.getElementsByClassName("s_number");
for(var i =0;i<number.length;i++){
    
	number[i].addEventListener('click',function(){
        var output=reverseNumberFormat(getOutput());
        var history = getHistory();
        if (history.indexOf("cos")>=0 || history.indexOf("tan")>=0
        || history.indexOf("sin")>=0 || history.indexOf("log")>=0 || history.indexOf("exp")>=0){
            printHistory(history+this.id);
        }
		if(output!=NaN){ 
            output=output+this.id;
			printOutput(output);
		}
    });
}



