<?php
		include_once('../includes/db/config.php');
		$sql ="SELECT * FROM courses";
		$result = mysqli_query($conection_db, $sql);
		while($row = $result->fetch_assoc()){
			$contents .= "
			<tr>
			<td> ".$row['course_id']." </td>
			<td> ".$row['course_name']." </td>
			<td> ".$row['course_code']." </td>
			</tr>
			";
			}
	require_once('../Assets/tcpdf/tcpdf.php');  
    $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle("Generated PDF using TCPDF");  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage();
	$content = '';
    $content .= "
      	<h2>Admas University</h2>
        <h3>Department: Co Sc</h4>
		<h3>Course List</h3> 
      	<table>
		  <tr>
		  	<th>Index</th>
		  	<th>Course Name</th>
			<th>Course Code</th>
			</tr>";
    $content .= $contents;  
    $content .= "</table>
	<style>
	h2,h3 {
		text-align: center;
	  }
	table {
		border-collapse:collapse;
	}
	th,td {
		border:1px solid #888;
	}
	table tr th {
		background-color:#888;
		color:#fff;
		font-weight:bold;
	}
	</style>
	";  
    $pdf->WriteHTMLCell(290,0,3,'',$content,0); 
    $pdf->Output('Course.pdf', 'I');
?>