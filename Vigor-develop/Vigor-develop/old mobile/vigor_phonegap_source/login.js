function checkLogin(userLogin, passLogin){
	var request = $.ajax({
		url: "",
		type: "GET",
		data: { user : userLogin, password : passLogin },
		dataType: "json",
		beforeSend : function(){
			$.mobile.loading('show',{ theme: "b" });
		}
});

	//RESPONSE
	request.done(function(data) {
		$.mobile.loading('hide');

		The data["status"] == 'ok' is the echo in json that you send in your PHP to say if the login is correctly or not
		
		// Ej of PHP:
		 $query = mysql_num__rows(mysql_query("SELECT * from users WHERE user = '".$_GET["user"]."' AND password = '".$_GET["password"]."'"));
		 if($query == 1){
		     $data["status"] = "ok";
		     echo json_encode($data);
		 }else{
		     $data["status"] = "nok";
		     $data["msg"] = "Login incorrect, try again"
		     echo json_encode($data);
		 }

		if(data["status"] == "ok"){

		// If the status is OK, you load the screen that do you want
		$.mobile.changePage($("#index"),{ transition: "slidedown"} );

		}else{

		// If the status is not OK, you show an alert and no change the login page
		navigator.notification.alert(data["msg"],false,'Error','OK');
		}
	});
}  