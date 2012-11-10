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
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$url = $this->createUrl( 'ajaxRequest' );

		$script = <<<SCRIPT
var changed = false;

$("#raw").keyup( function() {changed=true;} );

successFct = function(data, textStatus) {
	$("#encoded").html(data);
};

ajaxCall = function() {
	if(changed)
		jQuery.ajax(
			{
			url : "$url",
			dataType : "html",
			type : "POST",
			data : 'raw='+$("#raw").val(),
			success : successFct,
			error : function() {console.log('ajaxError')}
			}
		) 
	changed = false;
	};

window.setInterval(ajaxCall , 1000);

SCRIPT;
		yii::app()->clientScript->registerScript('liveMarkDown', $script, CClientScript::POS_READY );
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