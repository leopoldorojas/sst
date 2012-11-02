<?php

class ActivityReportController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'view' actions
				'actions'=>array('view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'report' actions
				'actions'=>array('report','reportAll'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id,$m=NULL)
	{
		$model=$this->loadModel($id);
		$criteria=new CDbCriteria;
		$criteria->with='employee';
		$criteria->compare('activity_id',$model->id);
		$assignedEmployeesDataProvider=new CActiveDataProvider('Assignment', array(
				'criteria'=>$criteria,
			)
		);

		// Building the Data Provider with all the tourist assigned to this Activity
		$tourists=array();

		foreach ($model->services as $service)
			foreach ($service->booking->paxes as $pax)
				array_push($tourists,$pax);

		$touristDataProvider = new CActiveDataProvider("Pax");
		$touristDataProvider->setData($tourists); 

		if (isset($_GET['p'])) {
			$this->layout='//layouts/column1_print';
			$mPDF1 = Yii::app()->ePdf->mpdf();

			// Here should be Header Data of the Report: Logo, Date, etc.
			// Still is missing some styles for this grid

			$mPDF1->WriteHTML($this->render('view', array(
				'model'=>$model,
				'assignedEmployeesDataProvider'=>$assignedEmployeesDataProvider,
				'touristDataProvider'=>$touristDataProvider,
			), true));

			$mPDF1->Output('protected/runtime/Activity_Report.pdf',EYiiPdf::OUTPUT_TO_FILE);
			$this->layout='//layouts/column1';
			$this->redirect(array('view','id'=>$model->id, 'm'=>'1'));	
		} else {
			$this->render('view',array(
				'model'=>$model,
				'assignedEmployeesDataProvider'=>$assignedEmployeesDataProvider,
				'touristDataProvider'=>$touristDataProvider,
				'message'=>($m) ? 'El reporte de la Actividad fue ejecutado exitosamente' : '',
			));
		}
	}

	/**
	 * Report selected models.
	 */
	public function actionReport($m=NULL)
	{
		$model=new Activity('search');
		$model->unsetAttributes();  // clear any default values
		$searchForm=new ActivityReportForm;

		if(isset($_GET['Activity']))
			$model->attributes=$_GET['Activity'];

		if(isset($_GET['ActivityReportForm']))
			$searchForm->attributes=$_GET['ActivityReportForm'];
		else {
			$searchForm->startDate=date("Ymd");
			$searchForm->endDate=date("Ymd");
		}

		$this->render('report',array(
			'model'=>$model,
			'searchForm'=>$searchForm,
			'message'=>($m) ? 'El reporte de Actividades fue ejecutado exitosamente' : '',
		));
	}

	/** 
	 * Print all models selected
	 */
	public function actionReportAll()
	{
		$model=new Activity('search');
		$model->unsetAttributes();  // clear any default values
		$searchForm=new ActivityReportForm;

		if(isset($_GET['Activity']))
			$model->attributes=$_GET['Activity'];

		if(isset($_GET['ActivityReportForm']))
			$searchForm->attributes=$_GET['ActivityReportForm'];
		else {
			$searchForm->startDate=date("Ymd");
			$searchForm->endDate=date("Ymd");
		}
	
		$dataProvider=$model->searchForReport($searchForm);
		$allActivities=$dataProvider->data;
		$this->layout='//layouts/column1_print';
		$mPDF1 = Yii::app()->ePdf->mpdf();

		foreach ($allActivities as $activity) {
			$criteria=new CDbCriteria;
			$criteria->with='employee';
			$criteria->compare('activity_id',$activity->id);
			$assignedEmployeesDataProvider=new CActiveDataProvider('Assignment', array(
					'criteria'=>$criteria,
				)
			);

			// Building the Data Provider with all the tourist assigned to this Activity
			$tourists=array();

			foreach ($activity->services as $service)
				foreach ($service->booking->paxes as $pax)
					array_push($tourists,$pax);

			$touristDataProvider = new CActiveDataProvider("Pax");
			$touristDataProvider->setData($tourists); 

			// Here should be Header Data of the Report: Logo, Date, etc.
			// Still is missing some styles for this grid

			$mPDF1->WriteHTML($this->render('view', array(
				'model'=>$activity,
				'assignedEmployeesDataProvider'=>$assignedEmployeesDataProvider,
				'touristDataProvider'=>$touristDataProvider,
			), true));
			$mPDF1->WriteHTML('<hr /><hr />');
		}

		$mPDF1->Output('protected/runtime/Activities_Report.pdf',EYiiPdf::OUTPUT_TO_FILE);
		$this->layout='//layouts/column1';
		$this->redirect(array('report', 'm'=>'1'));
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Activity::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		// $model->activity_time=substr($model->activity_time,0,5); // Comment for conflicts with MVC Practice. Format in the view
		return $model;
	}
}
