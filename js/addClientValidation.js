function chkPhoneNo() {
	if (chk != 0) {
		alert("Please input a digit in the apple text field.");
		document.getElementById("bill").value = "NaN";
		num.focus();
		num.select();
		return false;
     } 
}

function isEmpty() {//checks if all fields are complete
    if (document.getElementById("lastr").value == "" || document.getElementById("firstr").value == "" ||document.getElementById("lastc").value == "" ||
        document.getElementById("firstc").value == "" || document.getElementById("company").value == "" || document.getElementById("tel").value == "" || 
        document.getElementById("email").value == "" || document.getElementById("oadd").value == ""){
        alert("Please fill out all fields.");
        return false;
    }
}