
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>  
<script>
$(document).ready(function () {  
    var form = $('.canvas'),  
    cache_width = form.width(),  
    a4 = [595.28, 841.89]; // for a4 size paper width and height  

    // $('#generate_pdf').on('click', function () {  
        // $('body').scrollTop(0);  
    // });  
	setTimeout(
	function() 
	{
        generatePDF();  
	}, 1000);

    function generatePDF() {  
        getCanvas().then(function (canvas) {  
            var img = canvas.toDataURL("image/png"),  
             doc = new jsPDF({  
                 unit: 'mm',  
				 orientation:'potrait',
				 format:[form.width()*0.26458333, form.height()*0.26458333]
             });  
            doc.addImage(img, 'JPEG', 0, 0);  
            doc.save('cv.pdf');  
            form.width(cache_width);  
        });  
    }  

    function getCanvas() {  
        form.width((a4[0] * 1.33333)).css('max-width', 'none');  
        return html2canvas(form, {  
            imageTimeout: 2000,  
            removeContainer: true  
        });  
    }
});
</script>