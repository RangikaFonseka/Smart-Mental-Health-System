<?php
session_start();
include "../dBConn.php";

if (isset($_POST['pdfInfo'])) {
    $pa_Id = $_POST['pa_Id'];
    $do_Id = $_POST['do_Id'];
    $session_Id = $_POST['session_Id'];

    // Fetch patient data
    $paDataQry = "SELECT * FROM patient_info WHERE p_Id='$pa_Id'";
    $pa_data = mysqli_query($connection, $paDataQry);

    if (mysqli_num_rows($pa_data) > 0) {
        while ($pa_row_data = mysqli_fetch_array($pa_data)) {
            $p_Name = $pa_row_data['p_Name'];
            $p_Nic = $pa_row_data['p_Nic'];
            $p_Age = $pa_row_data['p_Age'];
            $p_Gender = $pa_row_data['p_Gender'];
        }
    }

    // Fetch session data
    $saDataQry = "SELECT * FROM session_info WHERE session_Id='$session_Id'";
    $sa_data = mysqli_query($connection, $saDataQry);

    if (mysqli_num_rows($sa_data) > 0) {
        while ($sa_row_data = mysqli_fetch_array($sa_data)) {
            $session_info = $sa_row_data['session_info'];
            $c_info= $sa_row_data['c_info'];
            $appo_Id = $sa_row_data['appo_Id'];
            $createTime=$sa_row_data['createTime'];
        }
    }



    //doctor Infotmation 

    $doDataQry = "SELECT * FROM doctors WHERE doc_Id='$do_Id'";
    $do_data = mysqli_query($connection, $doDataQry);

    if (mysqli_num_rows($do_data) > 0) {
        while ($do_row_data = mysqli_fetch_array($do_data)) {
            $doc_Name = $do_row_data['doc_Name'];
            $telephone = $do_row_data['telephone'];
        }
    }




    $dateTime = new DateTime();
    $currentDateTime = $dateTime->format('Y-m-d H:i:s');



}

// Include TCPDF library
require_once('vendor/tecnickcom/tcpdf/tcpdf.php');

ob_start(); // Start output buffering

// Create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Medical Report');
$pdf->SetSubject('Medical Report');
$pdf->SetKeywords('TCPDF, PDF, medical, report');

// Set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 10);

// Add content
$html = "
<table cellspacing='0' cellpadding='1'>
    <tr>
        <td><b>Patient Name:</b> $p_Name</td>
        <td><b>Case #:</b> D-08-0013908</td>
    </tr>
    <tr>
        <td><b>Age/Sex:</b>$p_Age, $p_Gender </td>
        <td><b>Collected:</b>$currentDateTime</td>
    </tr>
    <tr>
        <td><b>MRN:</b> 545454545</td>
        <td><b>Received:</b>$createTime</td>
    </tr>
    <tr>
        <td><b>Patient NIC:</b>$p_Nic</td>
        <td><b>Deliver to:</b>Dr.$doc_Name ,Tele-$telephone </td>
    </tr>
    <tr>
        <td><b>Provider:</b> DOC TEST1 MD</td>
        <td></td>
    </tr>
</table>

<h2 style='color:blue;'>MENTAL HELTH REPORT</h2>

<p><b>Medical Condition</b><br>

<p><b>Medical History</b><br>
$session_info<br>


<p><b>Curunt Medication</b><br>
$c_info<br>

<p><b>Other Report and Testing</b><br>





<p><b>Date Printed:</b> $currentDateTime</p>
";

// Output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
$pdf->Output('medical_report.pdf', 'I');

ob_end_flush(); // Flush the output buffer
?>
