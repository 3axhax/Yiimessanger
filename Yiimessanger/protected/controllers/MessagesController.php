<?php

class MessagesController extends Controller
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
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
		$model = $this->loadModel($id);
		if ($model->id_response == Yii::app()->user->id)
		{
			$model->seen = 1;
			$model->save();
		}
		$this->render('view',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Messages;
		$list = 'contact';
		if (isset($_GET['request'])) $list = 'request';
        if (isset($_GET['id_response'])) {

            $model->id_response = $_GET['id_response'];

            if (isset($_POST['Messages'])) {
                $model->attributes = $_POST['Messages'];
                $model->id_sender = Yii::app()->user->id;
                $model->time = new CDbExpression('NOW()');
                if ($list == 'request') {
                    $model->message = 'Please add me to your contact list';
                    Users::requestToContactList($model->id_response);
                }
                $model->save();
            }
            
            //history old message
            
            $history = Messages::model()->findAll(array(
                'condition' => '(id_sender="' . Yii::app()->user->id . '" and id_response="' . $_GET['id_response'] . '") or (id_sender="' . $_GET['id_response'] . '" and id_response="' . Yii::app()->user->id . '")',
                'order' => 'time DESC'
            ));
        }
		$this->render('create',array(
			'model'=>$model,
            'history' => $history,
			'list'=>$list,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$model=new Messages('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Messages']))
			$model->attributes=$_GET['Messages'];
		if(($model->inOut = $_GET['inOut']) == 'in')$model->id_response = Yii::app()->user->id;
		if(($model->inOut = $_GET['inOut']) == 'out')$model->id_sender = Yii::app()->user->id;
		$this->render('index',array(
			'model'=>$model,
            'column' => $model->columnForMessages($model->inOut)
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Messages the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Messages::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Messages $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='messages-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
