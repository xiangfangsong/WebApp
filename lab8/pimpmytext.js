function hi(){
	setInterval(biger,500);
}

function biger() {
	//$("ta").style.fontSize = "24pt";
	if($("ta").style.fontSize == "")
		$("ta").style.fontSize = "12pt";
	else {
		let size = parseInt($("ta").style.fontSize) + 2;
		$("ta").style.fontSize = size+"pt";
	}
}

function bl(){
	if($("bli").checked == true){
		$("ta").style.fontWeight = "bold";
		$("ta").style.color = "green";
		$("ta").style.textDecoration = "underline";
		document.body.style.backgroundImage = "url(https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/8/hundred.jpg)";
	}
	else{
		$("ta").style.fontWeight = "";
		$("ta").style.color = "";
		$("ta").style.textDecoration = "";
		document.body.style.backgroundImage = "";
	}
}

function upa(){
	let str = $("ta").value;
	$("ta").style.textTransform = "uppercase";
	let temp = str.split(".");
	str = temp.join("-izzle.");
	$("ta").value = str;
}