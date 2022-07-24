<?php
		include_once('../includes/db/config.php');
		$sql =" SELECT coco_id, course_name, ins_name, sec_name from course_comb join 
                courses on courses_course_id=course_id join instructors on instructors_ins_id=ins_id 
				join sections on sections_sec_id=sec_id;";
		$result = mysqli_query($conection_db, $sql);
		while($row = $result->fetch_assoc()){
			$contents .= "
			<tr>
			<td> ".$row['coco_id']." </td>
			<td> ".$row['course_name']." </td>
			<td> ".$row['ins_name']." </td>
			<td> ".$row['sec_name']." </td>
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
		<h3>Assignned Classes</h3> 
      	<table>
		  <tr>
		  	<th>Index</th>
		  	<th>Course Name</th>
			<th>Instructor</th>
			<th>Section</th>
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
    $pdf->Output('Class.pdf', 'I');
?>