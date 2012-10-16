<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$this->renderPartial('_welcome');
?>

<p>Let's start!</p>
<p>
	You can create activities in 2 ways. <b>Choose your option</b>:
	<ul>
		<li>[<a href="<?php echo CHtml::encode($this->createUrl('service/adminActivities')) ?>"><b>By SERVICE</b></a>] : 
			<a href="<?php echo CHtml::encode($this->createUrl('service/adminActivities')) ?>">
				Here you can look for a specific Service and then create it its Activity</li>
			</a>
		<li>[<a href="<?php echo CHtml::encode($this->createUrl('activity/create')) ?>"><b>By ACTIVITY</b></a>] : 
			<a href="<?php echo CHtml::encode($this->createUrl('activity/create')) ?>">
				Here you create a new Activity and assign it to an existing Service</li>
			</a>
	</ul>
</p>

<p>For more details about this application, please contact to
<a href="mailto:jwalker@costaricaexpeditions.com">Jarl Walker</a>, or
contact Application Vendor and Developer on <a href="http://www.arckanto.com" target=_blank>Arckanto software</a>
</p>
