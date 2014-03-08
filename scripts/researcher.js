(function($){
	maketabs = function(){
				$("#create").click(function(){
					$("#create").fadeTo("fast", 1.0); 
					$("#review").fadeTo("fast", 0.3);
					$("#questions").fadeTo("fast", 0.3);
					$("#settings").fadeTo("fast", 0.3);
					$("#createbox").fadeIn(1000);
					$("#reviewbox").fadeOut(); 
					$("#questionbox").fadeOut(); 
					$("#settingbox").fadeOut();
				});
				$("#review").click(function(){
					$("#create").fadeTo("fast", 0.3); 
					$("#review").fadeTo("fast", 1.0); 
					$("#questions").fadeTo("fast", 0.3); 
					$("#settings").fadeTo("fast", 0.3); 
					$("#createbox").fadeOut(); 
					$("#reviewbox").fadeIn(1000); 
					$("#questionbox").fadeOut(); 
					$("#settingbox").fadeOut(); 
				});
				$("#questions").click(function(){
					$("#create").fadeTo("fast", 0.3); 
					$("#review").fadeTo("fast", 0.3); 
					$("#questions").fadeTo("fast", 1.0); 
					$("#settings").fadeTo("fast", 0.3);
					$("#createbox").fadeOut(); 
					$("#reviewbox").fadeOut(); 
					$("#questionbox").fadeIn(1000); 
					$("#settingbox").fadeOut(); 
				});
				$("#settingbox").click(function(){
					$("#create").fadeTo("fast", 0.3); 
					$("#review").fadeTo("fast", 0.3);
					$("#questions").fadeTo("fast", 0.3); 
					$("#settings").fadeTo("fast", 1.0); 
					$("#createbox").fadeOut(); 
					$("#reviewbox").fadeOut(); 
					$("#questionbox").fadeIn();
					$("#settingbox").fadeOut(1000); 
				});
	});


