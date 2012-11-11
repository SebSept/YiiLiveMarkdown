<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
/*			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
*/			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$ajaxUrl = $this->createUrl( 'ajaxRequest' );
		$refreshInterval =  yii::app()->params->md_refreshInterval;
		$script = <<<SCRIPT
					var ajaxUrl = '$ajaxUrl';
					var refreshInterval = $refreshInterval;
SCRIPT;
		$cs = yii::app()->clientScript;
		$cs->registerCoreScript('jquery');
		$cs->registerScript('liveMarkDown', $script, CClientScript::POS_HEAD );
		$cs->registerScriptFile(yii::app()->baseUrl.'/js/ajaxRequest.js', CClientScript::POS_END);
		$this->render('index');
	}

	public function actionAjaxRequest()
	{
		if(!isset($_POST['raw']))
		{
			print '<p>no post</p>';
			return;
		}
		$md = new CMarkdown();
		print $md->transform($_POST['raw']);
//		print '<h2>raw='.$_POST['raw'].'</h2>';
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
}
