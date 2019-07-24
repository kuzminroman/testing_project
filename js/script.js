/* 
vue 
vuetify -visual framework */

function funcSuccess(data){
	
	$("#show").append("<b>Основной: Домашний телефон </b><input type = 'radio' name = 'phone' value = 'home'><input id = 'home' name = 'home' type='text' class='form-control bfh-phone' data-country='RU'  aria-describdby = 'textHelp' placeholder = 'Home hone'/><br/>");
    $("#home").hide();
}

$(document).ready(function(){
	$("#home").bind("click", function () {
		
		var add = "";
		$.ajax ({
		url: "/views/user/regist.php",
        type: "POST",		
		data: ({add: add}),
		dataType: "html",
		success: funcSuccess
		});
	});
});


function funcS(data){
	
	$("#show").append("<b>Основной: Рабочий телефон </b><input type = 'radio' name = 'phone' value = 'work'><input id = 'work' name = 'work' type='text' class='form-control bfh-phone' data-country='RU'  aria-describdby = 'textHelp' placeholder = 'Work phone'/><br/>");
    $("#work").hide();
}

$(document).ready(function(){
	$("#work").bind("click", function () {
		
		var add = "";
		$.ajax ({
		url: "/views/user/regist.php",
        type: "POST",		
		data: ({add: add}),
		dataType: "html",
		success: funcS
		});
	});
});


function funcEm(data){
	
	$("#semail").append("<label for = 'exampleInputEmail'> Дополнительня почта </label><input id = 'exampleInputEmail' name = 'second_email' type='email' class='form-control' aria-describdby = 'emailHelp' placeholder = 'Email'/><br/>");
    $("#addmail").hide();
	
	}

$(document).ready(function(){
	$("#addmail").bind("click", function () {
		
		var add = "";
		$.ajax ({
		url: "/views/user/regist.php",
        type: "POST",		
		data: ({add: add}),
		dataType: "html",
		success: funcEm
		});
	});
});