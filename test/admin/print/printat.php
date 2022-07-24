<?php
		if(isset($_POST['submit'])){
			$course = $_POST['course'];
			$section = $_POST['section'];
			$term = $_POST['term'];
		}
		include_once('../includes/db/config.php');
		$co ="SELECT course_code,course_name from courses where course_id = '".$course."' ";
		$sec ="SELECT sec_name from sections where sec_id = '".$section."' ";
		$arrays = array();
		$query = "SELECT distinct ses_date from session where sections_sec_id = '".$section."' and courses_course_id = '".$course."'";
		$result = mysqli_query($conection_db, $query) or die(mysqli_error($conection_db));
		while ($row = mysqli_fetch_assoc($result)) {
			foreach ($row as $data) {
				array_push($arrays, $data);
			}
		}

		$student_name = array();
		$student_id = array();
		
		$query = "SELECT id_no from students  where sections_sec_id = '$section'";
		$studquery = "SELECT stud_name from students  where sections_sec_id = '$section'";
		
		$result = mysqli_query($conection_db, $query) or die(mysqli_error($conection_db));
		while ($rows = mysqli_fetch_assoc($result)) {
			foreach ($rows as $count) {
				array_push($student_id, $count);
			}
		}

		$studresult = mysqli_query($conection_db, $studquery) or die(mysqli_error($conection_db));
                        while ($studrows = mysqli_fetch_assoc($studresult)) {
                            foreach ($studrows as $studcount) {
                                array_push($student_name, $studcount);
                            }
                        }

		//fetch Session dates from db and add to att_date array
		$att_date = array();
		$sql = "SELECT distinct ses_date from session where sections_sec_id = '$section' ";
		$data = mysqli_query($conection_db, $sql) or die(mysqli_error($conection_db));

		while ($row = mysqli_fetch_assoc($data)) {
			foreach ($row as $count_date) {
				array_push($att_date, $count_date);
			}
		}
		$main_array = array();
		$sub_array = array();

		//select a student from student list and get the status on a session
		// and store attendance of that student for all sessions on sub_array 
		for ($a = 0; $a < sizeof($student_id); $a++) {


			for ($d = 0; $d < sizeof($att_date); $d++) {
				$sqm = "select status from attendance join session on
						 session_ses_id = session.ses_id where ses_date= '$att_date[$d]' and
						  students_id_no = '$student_id[$a]' and courses_course_id= '$course' ;";
				$sub_data = mysqli_query($conection_db, $sqm) or die(mysqli_error($conection_db));

				while ($rowsr = mysqli_fetch_assoc($sub_data)) {
					foreach ($rowsr as $sub_count) {
						array_push($sub_array, $sub_count);
					}
				}
			}
			//Add that students data to the main_array
			$main_array[$a] = $sub_array;
			//remove first students data from Sub_array
			unset($sub_array);
			//initialize Subarray
			$sub_array = array();
		}
		
		$coout=mysqli_query($conection_db,$co);
		$secout=mysqli_query($conection_db,$sec);
		
		while($out = $coout->fetch_assoc()){
			$cocdis = $out['course_code'];
			$condis = $out['course_name'];
		}
		while($sout = $secout->fetch_assoc()){
			$sndis = $sout['sec_name'];
		}
		//use for MySQLi OOP
		$contents = '';
		for ($i = 0; $i < sizeof($main_array); $i++) {
			$contents .= "
			<tr>
			<td> ".$student_name[$i]." </td>
			<td> ".$student_id[$i]." </td>
			<td>Co Sc</td>
			";
			//insert status of every student into each column
			for ($jj = 0; $jj < sizeof($main_array[$i]); $jj++) {
			$contents .= "
				<td> ".$main_array[$i][$jj]." </td>
				";
			}
			$contents .= " </tr>
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
    $pdf->SetFont('helvetica', '', 8);  
    $pdf->AddPage();
	$image_path = 'assets/img/logo.jpg';
	$content = '';
    $content .= "
      	<h2>Admas University</h2>
		<h3>Degree Students Attendance Sheet</h3>
      	<h4>Course Title: ".$cocdis."/".$condis.":</h4>
		<h4>Department: Co Sc</h4>
		<h4>Section: ".$sndis."</h4> 
		<h4>Term: ".$term." </h4>
      	<table>
		  <tr>
		  	<th>Full Name</th>
			<th>Student ID</th>
			<th>Department</th>
		  "; 
		  foreach ($arrays as $dates) {
			$content .= "
			  <th> ".$dates." </th>
			  ";
			}
	$content .= "</tr>";
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
    $pdf->Output('Attendance.pdf', 'I');
?>