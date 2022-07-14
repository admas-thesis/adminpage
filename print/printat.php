<?php
		if(isset($_POST['submit'])){
			$course = $_POST['course'];
			$section = $_POST['section'];
			$term = $_POST['term'];
		}
		include_once('../includes/db/config.php');
		$co ="SELECT course_code,course_name from courses where course_id = '".$course."' ";
		$sec ="SELECT sec_name from sections where sec_id = '".$section."' ";
		$query=" SELECT distinct ses_date from session where sections_sec_id = '".$section."' and courses_course_id = '".$course."'";
		
		$sql =" SELECT att_id,status,students_id_no,session_ses_id,stud_name,ses_date,courses_course_id from attendance 
						 join session on session_ses_id=ses_id 
						 join students on students_id_no = id_no where courses_course_id = '".$course."'";
		$coout=mysqli_query($conection_db,$co);
		$secout=mysqli_query($conection_db,$sec);
		$output=mysqli_query($conection_db,$query);
		$result=mysqli_query($conection_db,$sql); 
		while($out = $coout->fetch_assoc()){
			$cocdis = $out['course_code'];
			$condis = $out['course_name'];
		}
		while($sout = $secout->fetch_assoc()){
			$sndis = $sout['sec_name'];
		}
		//use for MySQLi OOP
		$contents = '';
		while($in = $result->fetch_assoc()){
			$contents .= "
			<tr>
				<td>".$in['stud_name']."</td>
				<td>ADMA/".$in['students_id_no']."</td>
				<td>Co Sc</td>
				<td>".$in['status']."</td>
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
      	<h2 align='center'>Admas University</h2>
		<h3 align='center'>Degree Students Attendance Sheet</h3>
      	<h4>Course Title: ".$cocdis."/".$condis.":</h4>
		<h4>Department: Co Sc</h4>
		<h4>Section: ".$sndis."</h4> 
		<h4>Term: ".$term." </h4>
      	<table>  
           <tr>  
				<th>Full Name</th>
				<th>Student ID</th>
				<th>Department</th>";
	while($row = $output->fetch_assoc()){
	$content .= "
			<th>".$row['ses_date']."</th>
      ";}
	$content .= "</tr>";
    $content .= $contents;  
    $content .= "</table>
	<style>
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
    $pdf->Output('Attendance.pdf', 'I');
	

?>