function calculateTip(){

    var amount = document.getElementById("amount").value;
    var service_quality = document.getElementById("serviceQual").value;
    var people = document.getElementById("person").value;

    if (amount == "" || service_quality == 0 ){
        alert ("Please enter values");
        return;
    }

    if (people === "" || people <= 1) {
        people = 1;
        document.getElementById("each").style.display = "none";
      } else {
        document.getElementById("each").style.display = "block";
      }
    
      var total = (amount * service_quality) / people;
      total = Math.round(total * 100) / 100;
      total = total.toFixed(2);
      document.getElementById("totalTip").style.display = "block";
      document.getElementById("tip").innerHTML = total;
    
}
document.getElementById("totalTip").style.display = "none";
document.getElementById("each").style.display = "none";
document.getElementById("calculate").onclick = function() {
  calculateTip();
};