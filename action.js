var hr = new XMLHttpRequest();
				
				hr.open("POST", "coordwriter.php", true);
				// Set content type header information for sending url encoded variables in the request
				  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				
				hr.send(); // Actually execute the request