<?php
// $pdf_url = $_GET["location"];
  
// $pdf_path = "http://localhost/onlineedu/public/course_pdfs/".$pdf_path;
$pdf_path = "https://onlineedu.madhusudhank.com/course_pdfs/".$pdf_path;
// echo $pdf_path;
// exit;

echo "<input type='hidden' value='{$pdf_path}' id='doc-pdf-url'>";
?>
<html>
<head>
       <title>Courese View</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.3.200/pdf.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        window.onload = function() {
            setTimeout(function(){ document.getElementById("load").innerHTML = "Loading..."; }, 3000);
            
        }
    </script>

    <script>

        
        window.onload = function() {
            // $(".loader-wrapper").fadeOut("slow");
            document.addEventListener("contextmenu", function(e){
                e.preventDefault();
                if(event.keyCode == 123) {
                disableEvent(e);
            }
            }, false);
         function disableEvent(e) {
                if(e.stopPropagation) {
                    e.stopPropagation();
                } else if(window.event) {
                    window.event.cancelBubble = true;
                }
            }
            setTimeout(myFunction(), 6000);

        }
        $(document).contextmenu(function() { return false;});
        // url = "http://localhost/onlineedu/public/storage/course_files/digital marketting 1_1607434987.pdf";
        url = $("#doc-pdf-url").val();
        var thePdf = null;
        var scale = 1.4;
        pdfjsLib.getDocument(url).promise.then(function(pdf) {
                  thePdf = pdf;
                  viewer = document.getElementById('pdf-viewer');
                  for(page = 1; page <= pdf.numPages; page++) {
                    canvas = document.createElement("canvas");
                    canvas.className = 'pdf-page-canvas';
                    viewer.appendChild(canvas);
                    renderPage(page, canvas);
                  }
              });
              function renderPage(pageNumber, canvas) {
                  thePdf.getPage(pageNumber).then(function(page) {
                    viewport = page.getViewport(scale);
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;
                    page.render({canvasContext: canvas.getContext('2d'), viewport: viewport});
              });
              }
             
    </script>
<script>
    var current_count= 4;

function countDown() {
            var countVal = "";
     if ( current_count >= 0 ) {
            //    countVal = "<h1> Loading... " + "" + " sec.</h1>";
               countVal = "<h1> Loading...</h1>";
               current_count--;
             }
     else {
       clearInterval(countJob);
        countVal = "<h1> </h1>";
     }
            document.getElementById("countContainer").innerHTML = countVal;
}

var countJob = setInterval("countDown()", 400);
</script>
    <style type="text/css">
            

		#pdf-viewer {
			border-top: #2A2C7F 4px solid;
            border-style: groove;
			border-radius: 5px;
			padding: 0 0 10% 12%;
            /* margin:auto; */
		}

		 
	</style>

</head>
<body>
    



    <div style="font-size: 2.2em;
    color: #2A2C7F;
    text-align: center;
    margin:auto;
    font-family: Arial;" >
        Learn In Onlineedu
    </div>
    <span id="countContainer" style="
    color: #2A2C7F;
    text-align: center;
    margin:auto;
    font-family: Arial;" >  Loading... </span>

    {{-- <span id="myDIV">Loading....</span> --}}
    <div id="pdf-viewer">
    </div>
</body>
</html>