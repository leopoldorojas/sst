<?php
# mPDF
        $mPDF1 = Yii::app()->ePdf->mpdf();
 
        # render (full page)
        $mPDF1->WriteHTML($this->render('view', array(
			'model'=>$model,
			'assignedEmployeesDataProvider'=>$assignedEmployeesDataProvider,
			'touristDataProvider'=>$touristDataProvider,
        ), true));
 
        # renderPartial (only 'view' of current controller)
        // $mPDF1->WriteHTML($this->renderPartial('view', array(), true));

        # Outputs ready PDF
        // $mPDF1->Output('/sst/protected/runtime/leo.pdf', EYiiPdf::OUTPUT_TO_FILE);
        $mPDF1->Output('protected/runtime/leo.pdf',EYiiPdf::OUTPUT_TO_FILE);
        // $html2pdf->Output('/path/to/file.pdf', EYiiPdf::OUTPUT_TO_FILE);
?>