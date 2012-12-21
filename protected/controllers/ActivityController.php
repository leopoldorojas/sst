<?php

class ActivityController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','byEmployee'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'admin'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
				'roles'=>array('admin', 'superadmin'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Activity;

		$selectableServices=Service::model()->selectableByActivities();
		$dataProvider = new CActiveDataProvider('Service');
		$dataProvider->setData($selectableServices);

		$selectableEmployees=Employee::model()->getEnabledEmployees();
		$employeeDataProvider = new CActiveDataProvider('Employee');
		$employeeDataProvider->setData($selectableEmployees);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Activity']))
		{
			$model->attributes=$_POST['Activity'];
			if($model->save()) {

				if(!empty($_POST['selectedService'])) {
					$selectedServices = explode(",", $_POST['selectedService']);

					foreach ($selectedServices as $value) {
						$activityService=new ActivityService;
						$activityService->activity_id=$model->id;
						$activityService->service_id=$value;					
						$activityService->save();
					}
				}

				if(!empty($_POST['assignedEmployees'])) {
					$assignedEmployees = explode(",", $_POST['assignedEmployees']);

					foreach ($assignedEmployees as $value) {
						$assignment=new Assignment;
						$assignment->activity_id=$model->id;
						$assignment->employee_id=$value;					
						$assignment->save();
					}
				}

				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'dataProvider'=>$dataProvider,
			'employeeDataProvider'=>$employeeDataProvider,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		$selectableServices=Service::model()->selectableByActivities();
		$dataProvider = new CActiveDataProvider('Service');
		$dataProvider->setData($selectableServices);

		$selectableEmployees=Employee::model()->getEnabledEmployees($model->id, false);
		$employeeDataProvider = new CActiveDataProvider('Employee');
		$employeeDataProvider->setData($selectableEmployees);

		$assignedServicesDataProvider=new CArrayDataProvider(ActivityService::model()->with('service')->findAllByAttributes(array('activity_id'=>$model->id)));
		$assignedEmployeesDataProvider=new CArrayDataProvider(Assignment::model()->with('employee')->findAllByAttributes(array('activity_id'=>$model->id)));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Activity']))
		{
			$model->attributes=$_POST['Activity'];
			if($model->save()) {

				if(!empty($_POST['selectedService'])) {
					$selectedServices = explode(",", $_POST['selectedService']);

					foreach ($selectedServices as $value) {
						$activityService=new ActivityService;
						$activityService->activity_id=$model->id;
						$activityService->service_id=$value;					
						$activityService->save();
					}
				}

				if(!empty($_POST['assignedEmployees'])) {
					$assignedEmployees = explode(",", $_POST['assignedEmployees']);

					foreach ($assignedEmployees as $value) {
						$assignment=new Assignment;
						$assignment->activity_id=$model->id;
						$assignment->employee_id=$value;					
						$assignment->save();
					}
				}

				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'dataProvider'=>$dataProvider,
			'employeeDataProvider'=>$employeeDataProvider,
			'assignedServicesDataProvider'=>$assignedServicesDataProvider,
			'assignedEmployeesDataProvider'=>$assignedEmployeesDataProvider,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Activity');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Activity('search');
		$model->unsetAttributes();  // clear any default values
		$filterByCompleted=1; // Defauly is 'only uncompleted'

		if(isset($_GET['Activity']))
			$model->attributes=$_GET['Activity'];

		if(isset($_GET['filterByCompleted']))
			$filterByCompleted=$_GET['filterByCompleted'];		

		$this->render('admin',array(
			'model'=>$model,
			'filterByCompleted'=>$filterByCompleted,
		));
	}

	public function actionByEmployee($id)
	{
		$model=new Activity('search');
		$searchForm=new ActivityReportForm;
		$model->unsetAttributes();  // clear any default values
		$searchForm->unsetAttributes();  // clear any default values
		$searchForm->employee_id=$id;

		if ($_GET['lastMonth']=='true') {
			$searchForm->startDate=date("Ymd",mktime(0, 0, 0, date("m")-1, date("d"),   date("Y")));
			$searchForm->endDate=date("Ymd", mktime(0, 0, 0, date("m"), date("d")-1,   date("Y")));
		} else {
			$searchForm->startDate=date("Ymd",mktime(0, 0, 0, date("m"), date("d"),   date("Y")));
		}

		$dataProvider=$model->searchForReport($searchForm);

		$this->renderPartial('_activitiesByEmployee',
			array(
				'dataProvider'=>$dataProvider,
			),false,true);
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

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='activity-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
