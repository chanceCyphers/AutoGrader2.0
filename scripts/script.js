function showCreateQuestionSuccess() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			document.getElementById("question_status").innerHTML = xhttp.responseText;
		}		
	};
	xhttp.open("GET", "views/questions/create_success.php", true);
	xhttp.send();
}