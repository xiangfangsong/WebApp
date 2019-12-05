window.onload = function() {
    $("b_xml").onclick=function(){
    	//construct a Prototype Ajax.request object
		new Ajax.Request("books.php",{
			method: "GET",
			parameters: {category: getCheckedRadio($$("input"))},
			onSuccess: showBooks_XML,
			onFailure: ajaxFailed,
			onException: ajaxFailed
		});
    }
    $("b_json").onclick=function(){
    	//construct a Prototype Ajax.request object
		new Ajax.Request("books_json.php",{
			method: "GET",
			parameters: {category: getCheckedRadio($$("input"))},
			onSuccess: showBooks_JSON,
			onFailure: ajaxFailed,
			onException: ajaxFailed
		});
    }
};

function getCheckedRadio(radio_button){
	for (var i = 0; i < radio_button.length; i++) {
		if(radio_button[i].checked){
			return radio_button[i].value;
		}
	}
	return undefined;
}

function showBooks_XML(ajax) {
	//alert(ajax.responseText);
	$("books").innerHTML = "";
	var title = ajax.responseXML.getElementsByTagName("title");
	var author = ajax.responseXML.getElementsByTagName("author");
	var year = ajax.responseXML.getElementsByTagName("year");
	for(var i=0;i<title.length;i++){
		var temp = title[i].firstChild.nodeValue + 
		", by " + author[i].firstChild.nodeValue + 
		"(" + year[i].firstChild.nodeValue + ")";
		$("books").innerHTML = $("books").innerHTML + "<li>" + temp + "</li>";		
	}
}

function showBooks_JSON(ajax) {
	//alert(ajax.responseText);
	$("books").innerHTML = "";
	var data = JSON.parse(ajax.responseText).books;
	for(var i=0;i<data.length;i++){
		var temp = data[i].title + ", by " + data[i].author +
		"(" + data[i].year + ")";
		$("books").innerHTML = $("books").innerHTML + "<li>" + temp + "</li>";
	}
}

function ajaxFailed(ajax, exception) {
	var errorMessage = "Error making Ajax request:\n\n";
	if (exception) {
		errorMessage += "Exception: " + exception.message;
	} else {
		errorMessage += "Server status:\n" + ajax.status + " " + ajax.statusText + 
		                "\n\nServer response text:\n" + ajax.responseText;
	}
	alert(errorMessage);
}
