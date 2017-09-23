	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
	// Vanish Massage
$("#myElem").show();
setTimeout(function() { $("#myElem").fadeOut(); }, 5000);

//bootstrap tooltip

 $(function () {
   $('[data-toggle="tooltip"]').tooltip({
     animation: 'animated slideInDown'
   });
})

//shake effect
 $(document).ready(function() {
// Start when document will be ready.
$("#btn").click(function() {
var email = $("#email").val(); // Store E-mail input value in the variable email.
var password = $("#semester").val(); // Store Password input value in the variable password.
/* Check if email=formget@gmail.com and password=fugo then,Show the message Account Validated!!! in the Div having id message.*/
if (email == "formget@gmail.com" && password == "fugo") {
$(".error").html("Account Validated!!!");
}
/* If E-mail and Password do not match then shake Div having id maindiv and show the message "***Invalid email or password***" in the div having id message.*/
else {
$("#form1").effect("bounce");
$(".error").addClass("error");
}
});
});
 // Demo Panel

$(document).ready(function() {
	$("span.d").click(function() {
		$("body").addClass("d_body").removeClass("green_body blue_body red_body");
	});
	$("span.red").click(function() {
		$("body").addClass("red_body").removeClass("green_body blue_body");
	});
	$("span.green").click(function() {
		$("body").addClass("green_body").removeClass("red_body blue_body");
	});
	$("span.blue").click(function() {
		$("body").addClass("blue_body").removeClass("red_body green_body");
	});

	$("span#close_b").click(function() {
		$(".demo_panel").animate({right: '7px'},1000).effect( "pulsate", "1000" );
		$(this).hide();
		$("#open_b").css('display','block');
	});

	$("span#open_b").click(function() {
		$(".demo_panel").animate({right: '-218px'},1000);
		$(this).hide();
		$("#open_b").css('display','none');
		$("#close_b").css('display','block');
	});

	$(".dropdown").click(function() {
		$(".dropdown-menu li").animate('slow');
	});

	$(".logout_msg").hover(function() {
		$(".logout_msg").effect("pulsate");
	});
});






