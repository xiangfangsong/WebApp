"use strict";
var win = true;
var finish = false;
window.onload = function() {
	$("boundary1").onmouseover = function() {
		if(!finish){
			$("boundary1").addClassName("youlose");
			if(win){
				//alert("You lose!");
				$("status").innerHTML = "You lose!:(";
				win = false;
				finish = true;
			}
		}
	};
	var bou = $$("div.boundary");
	for(var i=0;i<bou.length;i++){
		bou[i].onmouseover = function() {
			if(!finish){
				for(var j=0;j<bou.length;j++){
					bou[j].addClassName("youlose");
				}
				if(win){
					//alert("You lose!");
					$("status").innerHTML = "You lose!:(";
					win = false;
					finish = true;
				}
			}
		};
	}
	$("end").onmouseover = function() {
		if(win && !finish){
			$("status").innerHTML = "You win!:)";
			finish = true;
			//alert("You win!");
		}
	};
	$("start").onclick = function() {
		$("status").innerHTML = "Click the \"S\" to begin.";
		win = true;
		finish = false;
		for(var i=0;i<bou.length;i++){
			bou[i].removeClassName("youlose");
		}
	};
	$("maze").onmouseleave = function() {
		if(!finish){
			for(var j=0;j<bou.length;j++){
				bou[j].addClassName("youlose");
			}
			if(win){
				//alert("You lose!");
				$("status").innerHTML = "You lose!:(";
				win = false;
				finish = true;
			}
		}
	};
};