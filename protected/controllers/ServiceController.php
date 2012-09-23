<?php

class ServiceController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('deny', 
				'actions'=>array('create','update', 'admin','adminActivities','delete'),
				'users'=>array('?'),
			),
			array('allow', 
				'actions'=>array('create','update', 'admin','adminActivities'),
				'roles'=>array('admin', 'superadmin'),
			),
			array('allow', 
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
		$model=new Service;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Service']))
		{
			$model->attributes=$_POST['Service'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Service']))
		{
			$model->attributes=$_POST['Service'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
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
		$dataProvider=new CActiveDataProvider('Service');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Service('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Service']))
			$model->attributes=$_GET['Service'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Service::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		// $model->pickuptime=substr($model->pickuptime,0,5); // Commented because MVC practice. Must format in the view
		// $model->dropofftime=substr($model->dropofftime,0,5); // Commented because MVC practice. Must format in the view
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='service-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


	/**
	* Create activities by this Service
	*/
	public function actionAdminActivities()
	{
		$searchForm=new DateRangeFilterForm();
		$model=new Service('search');
		$childModel=new ActivityService;
		$activityModel=new Activity;

		$searchForm->unsetAttributes();
		$model->unsetAttributes();  // clear any default values
		$childModel->unsetAttributes();
		$activityModel->unsetAttributes();

		if(isset($_GET['DateRangeFilterForm']))
			$searchForm->attributes=$_GET['DateRangeFilterForm'];

		if(isset($_GET['Service']))
			$model->attributes=$_GET['Service'];

		if(isset($_GET['ActivityService']))
			$childModel->attributes=$_GET['ActivityService'];

		if(isset($_GET['Activity']) && !empty($_GET['service_id']))
		{
			$activityModel->attributes=$_GET['Activity'];
			if ($activityModel->save()) {
				$model->id=$_GET['service_id'];
				$newActivityService=new ActivityService;
				$newActivityService->service_id=$model->id;
				$newActivityService->activity_id=$activityModel->id;
				$newActivityService->save();
				$activityModel->unsetAttributes();
			}
		}

		$this->render('adminActivities',array(
			'searchForm'=>$searchForm,
			'model'=>$model,
			'childModel'=>$childModel,
			'activityModel'=>$activityModel,
		));
	}
}
