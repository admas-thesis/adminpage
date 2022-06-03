<?php
	function generateRow(){
		$contents = '';
		include_once('../../includes/db_conn.php');
		$sql = "SELECT * FROM students";

		//use for MySQLi OOP
		$query = $db->query($sql);
		while($row = $query->fetch_assoc()){
			$contents .= "
			<tr>
				<td>".$row['stud_id']."</td>
				<td>".$row['stud_name']."</td>
				<td>".$row['id_no']."</td>
				<td>".$row['username']."</td>
				<td>".$row['sections_sec_id']."</td>
			</tr>
			";
		}
		
		return $contents;
	}

	require_once('../../Assets/tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
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
    $content .= '
      	<h2 align="center">Admas University</h2>
      	<h4>Students</h4>
      	<table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                	<th width="5%">Index</th>
				<th width="30%">Full Name</th>
				<th width="30%">Student ID</th>
				<th width="30%">Username</th>
				<th width="15%">Section</th>  
           </tr>  
      ';  
    $content .= generateRow();  
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output('Student.pdf', 'I');
	

?>