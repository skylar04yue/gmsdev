
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="chat.js"></script>	
	<style>
		#chat-wrap                      { border: 1px solid #eee; margin: 0 0 15px 0; }
		#chat-area                      { height: 300px; overflow: auto; border: 1px solid #666; padding: 20px; background: white; }
		#chat-area span                 { color: white; background: #333; padding: 4px 8px; -moz-border-radius: 5px; -webkit-border-radius: 8px; margin: 0 5px 0 0; }
		#chat-area p                    { padding: 8px 0; border-bottom: 1px solid #ccc; }

		#name-area                      { position: absolute; top: 12px; right: 0; color: white; font: bold 12px "Lucida Grande", Sans-Serif; text-align: right; }   
		#name-area span                 { color: #fa9f00; }


		#sendie                         { border: 3px solid #999; padding: 10px; font: 12px "Lucida Grande", Sans-Serif; }
	</style>
	
    <script>
    
        // ask user for name with popup prompt    
        var name = "<?php echo $peracc[0]['nickname']; ?>"; 
            	
    	// strip tags
    	name = name.replace(/(<([^>]+)>)/ig,"");
    	
    	// display name on page
    	$("#name-area").html("You are: <span>" + name + "</span>");
    	
    	// kick off chat
        var chat =  new Chat();
    	$(function() {
    	
    		 chat.getState(); 
    		 
    		 // watch textarea for key presses
             $("#sendie").keydown(function(event) {  
             
                 var key = event.which;  
           
                 //all keys including return.  
                 if (key >= 33) {
                   
                     var maxLength = $(this).attr("maxlength");  
                     var length = this.value.length;  
                     
                     // don't allow new content if length is maxed out
                     if (length >= maxLength) {  
                         event.preventDefault();  
                     }  
                  }  
    		 																																																});
    		 // watch textarea for release of key press
    		 $('#sendie').keyup(function(e) {	
    		 					 
    			  if (e.keyCode == 13) { 
    			  
                    var text = $(this).val();
    				var maxLength = $(this).attr("maxlength");  
                    var length = text.length; 
                     
                    // send 
                    if (length <= maxLength + 1) { 
                     
    			        chat.send(text, name);	
    			        $(this).val("");
    			        
                    } else {
                    
    					$(this).val(text.substring(0, maxLength));
    					
    				}	
    				
    				
    			  }
             });
            
    	});
    </script>
</head>

<body onload="setInterval('chat.update()', 1000)">
    <div id="page-wrap">
        <h3>Express Chat</h3>
        <p id="name-area"></p>
        <div id="chat-wrap" ><div id="chat-area" ></div></div>
		<div class="form-group">
			<form id="send-message-area">
				<p>Your message: </p>
				<textarea id="sendie" maxlength = '100' class="form-control"></textarea>
			</form>
		</div>
    </div>
</body>
</html>