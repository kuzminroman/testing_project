function funcSs(data){
	
	$("#house").remove();

}

$(document).ready(function(){
	$("#delete").bind("click", function () {
		
		var add = "";
		$.ajax ({
		url: "/views/user/regist.php",
        type: "POST",		
		data: ({add: add}),
		dataType: "html",
		success: funcSs
		});
	});
});