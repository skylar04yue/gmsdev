<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="FileSaver.js"></script>
</head>
<body>


<script type="text/javascript">
    var blob = new Blob(["Hello, world!"], {type: "text/plain;charset=utf-8"});
    saveAs(blob, "hello world.doc");
</script>



<div id="MainHTML">
  <h1>
   <center>Centered HTML H1 Heading</center>
  
  </h1>
  <h2>
   Heading 2
  </h2>
  <p>
  
  Some text inside paragraph.
  </p>
  <p>
<img src="https://res.cloudinary.com/dmsxwwfb5/image/upload/v1580916756/buy-me-min.png">

  </p>
</div>
<div>

<a class="word-export" href="javascript:void(0)" onclick="ExportToDoc()">Export to Doc</a>
</div>



<script type="text/javascript">
	function ExportToDoc(filename = ''){
    var HtmlHead = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Export HTML To Doc</title></head><body>";
  
    var EndHtml = "</body></html>";
  
    //complete html
    var html = HtmlHead +document.getElementById("MainHTML").innerHTML+EndHtml;

    //specify the type
    var blob = new Blob(['\ufeff', html], {
        type: 'application/msword'
    });
    
    // Specify link url
    var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(html);
    
    // Specify file name
    filename = filename?filename+'.doc':'document.doc';
    
    // Create download link element
    var downloadLink = document.createElement("a");

    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob ){
        navigator.msSaveOrOpenBlob(blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = url;
        
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
    
    document.body.removeChild(downloadLink);
}


</script>
	

</body>
</html>