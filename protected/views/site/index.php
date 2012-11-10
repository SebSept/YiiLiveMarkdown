<?php
/* 
@var $this SiteController 
*/

$this->pageTitle=Yii::app()->name;

echo CHtml::textArea('raw', '', array('style' => 'width:49%; height:350px; margin-right:1%; float:left'));

echo Chtml::tag('div', array('id' => 'encoded', 'style' => 'width:49%; float:left'));
