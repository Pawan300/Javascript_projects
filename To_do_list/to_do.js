
function addtask(){

    var li = document.createElement("li");
    task = document.getElementById("task").value;
    li.appendChild(document.createTextNode(task));

    if (task == ""){
        alert("You must write something!!!");
    }
    else{
        document.getElementById("to_do_incomplete").appendChild(li);
    }
    document.getElementById("task").value = "";
    var myNodelist = document.getElementsByTagName("li");
    var i;
    for (i = 0; i < myNodelist.length; i++) {
        var span = document.createElement("SPAN");
        var txt = document.createTextNode("\u00D7");
        span.className = "close";
        span.appendChild(txt);
        myNodelist[i].appendChild(span);
    }

    var close = document.getElementsByClassName("close");
    for (var i=0; i<close.length; i++){
        close[i].onclick = function(){
            var class_name = this.parentNode.parentNode.parentNode.className;
            var div = this.parentElement;
            if (class_name == "incomplete"){
                div.style.display = "none";
                div.style.display = "block";
                document.getElementById("to_do_complete").appendChild(div);
            }
            if (class_name == "complete"){
                div.style.display = "none";
            }

        }
    }
}