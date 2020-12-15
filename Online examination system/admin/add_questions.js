function add_mcq_questions(){

    document.getElementById("question_container").innerHTML="";
    
    var text_area = document.createElement("textarea");  
    text_area.setAttribute("id", "mcq_text_area");
    text_area.setAttribute("placeholder", "Type your question here");      
    document.getElementById("question_container").appendChild(text_area);

    var radio_id = ["radio1", "radio2", "radio3", "radio4"];
    var option_id = ["option1", "option2", "option3", "option4"];

    for (var i=0; i<4; i++){
        var radio = document.createElement("INPUT");
        radio.setAttribute("id", radio_id[i]);
        radio.setAttribute("type", "radio");
        
        var option = document.createElement("input");
        option.setAttribute("id", option_id[i]);
        option.setAttribute("type", "text");
       
        var br = document.createElement("br");
        
        document.getElementById("question_container").appendChild(radio);
        document.getElementById("question_container").appendChild(option);
        document.getElementById("question_container").appendChild(br);
    }
    var score = document.createElement("input");
    score.setAttribute("id", "score");
    score.setAttribute("type", "text");
    score.setAttribute("placeholder","Marks");
    document.getElementById("question_container").appendChild(score);

    score.style["width"] = "70px";
    score.style["height"] = "40px";
    score.style["margin"] = "10px 10px 10px 10px";

    var submit = document.createElement("button");
    // submit.innerHTML = '<button id="add_question_button name="submit_question" onclick="temp()"">';

    submit.id = "add_question_button";
    submit.innerHTML = "SUBMIT";
    submit.name = "submit_question";
    submit.onclick = loading_mcq_question;
    document.getElementById("question_container").appendChild(submit);
}

function loading_mcq_question(){
    
    var errors = [];
    var radio_id = ["radio1", "radio2", "radio3", "radio4"];
    var option_id = ["option1", "option2", "option3", "option4"];
    var flag_correct_answer = false;
    var clicked_correct_answer = -1;

    if(document.getElementById("mcq_text_area").value == ""){
        errors.push("Question is required\n");
    }
    for (var i=0; i<4; i++){
        
        if (document.getElementById(radio_id[i]).checked){
            flag_correct_answer = true;
            clicked_correct_answer = i;
        }

        if(document.getElementById(option_id[i]).value == ""){
            errors.push("Options is required\n");
            break;
        }
    }
    if(flag_correct_answer == false){
        errors.push("Choose the correct option" );
    }

    if(document.getElementById("score").value == ""){
        errors.push("Marks are required\n");
    }
    
    if(errors.length > 0){
        var message = "";
        for (var i=0; i<errors.length; i++){
            message += errors[i];
        }
        alert(message);
    }
    else{
        var data = new FormData(); 
        data.append('question', document.getElementById("mcq_text_area").value);
        data.append('option1', document.getElementById("option1").value);
        data.append('option2', document.getElementById("option2").value);
        data.append('option3', document.getElementById("option3").value);
        data.append('option4', document.getElementById("option4").value);
        data.append('correct_answer', document.getElementById(option_id[clicked_correct_answer]).value);
        data.append('score', document.getElementById("score").value);
        data.append('question_type',"MCQ");
        data.append('time', document.getElementById("time").value);
        data.append('date', document.getElementById("date").value);
        data.append('semester', document.getElementById("semester").value); 
        data.append("exam_name", document.getElementById("exam_name").innerHTML);  
        data.append('Course', document.getElementById("Course").value);  
        data.append('Year', document.getElementById("Year").value); 
        data.append('max_score', document.getElementById("Max_score").innerHTML);


        var xhr = new XMLHttpRequest();  
        xhr.open('POST', "mcq_database.php", true);
        xhr.onload = function () {
            var response = this.response;
            if (response.includes("OK")) {
                response = response.slice(2, response.length);
                var message = "Question has been added successfully. Total Score - "+response;
                document.getElementById("question_container").innerHTML=message;
                
            } else {
                alert(this.response);
                document.getElementById("question_container").innerHTML="";
            }
        };
        xhr.send(data);
        return false;
    }
}

function add_subjective_questions(){

    document.getElementById("question_container").innerHTML="";
    var text_area = document.createElement("textarea");  
    text_area.setAttribute("id", "subjective_text_area");
    text_area.setAttribute("placeholder", "Type your question here");      
    document.getElementById("question_container").appendChild(text_area);

    var score = document.createElement("input");
    score.setAttribute("id", "score");
    score.setAttribute("type", "text");
    score.setAttribute("placeholder","Marks");
    document.getElementById("question_container").appendChild(score);

    score.style["width"] = "70px";
    score.style["height"] = "40px";
    score.style["margin"] = "10px 10px 10px 10px";

    var submit = document.createElement("button");
    submit.id = "add_question_button";
    submit.innerHTML = "SUBMIT";
    submit.name = "submit_question";
    submit.onclick = loading_subjective_question;
    document.getElementById("question_container").appendChild(submit);
}

function loading_subjective_question(){
    var errors = [];
    if(document.getElementById("subjective_text_area").value == ""){
        errors.push("Question is required\n");
    }
    
    if(document.getElementById("score").value == ""){
        errors.push("Score is required\n");
    }
    if(errors.length > 0){
        var message = "";
        for (var i=0; i<errors.length; i++){
            message += errors[i];
        }
        alert(message);
    }
    else{
        var data = new FormData(); 
        data.append('question', document.getElementById("subjective_text_area").value);
        data.append('score', document.getElementById("score").value);
        data.append('question_type',"Subjective");
        data.append('time', document.getElementById("time").value);
        data.append('date', document.getElementById("date").value);
        data.append('semester', document.getElementById("semester").value); 
        data.append("exam_name", document.getElementById("exam_name").innerHTML);  
        data.append('Course', document.getElementById("Course").value);  
        data.append('Year', document.getElementById("Year").value); 
        data.append('max_score', document.getElementById("Max_score").innerHTML);


        var xhr = new XMLHttpRequest();  
        xhr.open('POST', "Subjective_database.php", true);
        xhr.onload = function () {
            var response = this.response;
            if (response.includes("OK")) {
                response = response.slice(2, response.length);
                var message = "Question has been added successfully. Total Score - "+response;
                document.getElementById("question_container").innerHTML=message;
                
            } else {
                alert(this.response);
                document.getElementById("question_container").innerHTML="";
            }
        };
        xhr.send(data);
        return false;
    
    }
    
}

