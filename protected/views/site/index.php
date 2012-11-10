<?php
/* 
@var $this SiteController 
*/

$this->pageTitle=Yii::app()->name;
?>
<div class="col6">
<h2>Markdown / Source</h2>
<?php
echo CHtml::textArea('raw');
?>
</div>

<div class="col6 last">
<h2>Html / Result</h2>
<?php
echo Chtml::tag('div', array('id' => 'encoded'));
?>
</div>