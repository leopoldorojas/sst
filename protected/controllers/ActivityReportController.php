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
				'actions'=>array('report'),
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
	public function actionView($id)
	{
		$model=$this->loadModel($id);
		$assignedEmployeesDataProvider=new CArrayDataProvider(Assignment::model()->with('employee')->findAllByAttributes(array('activity_id'=>$model->id)));

		// Building the Data Provider with all the tourist assigned to this Activity
		// $touristDataProvider=new CArrayDataProvider(Activity::model()->with('services.booking.paxes')->findAllByAttributes(array('id'=>$model->id)));
		$tourists=array();

		/* foreach ($model->services as $service)
			foreach ($service->booking as $booking)
				foreach ($booking->paxes as $pax)
					array_push($tourists,$pax); */

		$touristDataProvider = new CActiveDataProvider("Pax");
		$touristDataProvider->setData($tourists);

		$this->render('view',array(
			'model'=>$model,
			'assignedEmployeesDataProvider'=>$assignedEmployeesDataProvider,
			'touristDataProvider'=>$touristDataProvider,
		));
	}

	/**
	 * Report all models.
	 */
	public function actionReport()
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
		));
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
