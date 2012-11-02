<?php
/* @var $this ActivityReportController */
/* @var $model Activity */

$this->layout='//layouts/column1_print';
$mPDF1 = Yii::app()->ePdf->mpdf();

// Here should be Header Data of the Report: Logo, Date, etc.
// Still is missing some styles for this grid

$mPDF1->WriteHTML($this->render('view', array(
		'model'=>$model,
		'assignedEmployeesDataProvider'=>$assignedEmployeesDataProvider,
		'touristDataProvider'=>$touristDataProvider,
), true));

$mPDF1->Output('protected/runtime/leo.pdf',EYiiPdf::OUTPUT_TO_FILE);
$this->layout='//layouts/column1';
?>