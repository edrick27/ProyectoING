function ReporteFechas()
{
    var F1 = document.getElementById('F1').value;
    var F2 = document.getElementById('F2').value;
  
 window.open("../../Controlador/ReportController/documentDate.php?txt_Date1="+F1+"&txt_Date2="+F2,'','width=600,height=400,left=50,top=50,toolbar=yes'); 
}
