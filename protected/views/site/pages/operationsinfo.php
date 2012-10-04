<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Create Activities';
$this->breadcrumbs=array(
	'Operations System Information',
);
?>
<h1>Consult and Manage Operations System Information</h1>

<p>
	Please, click your option to select what information you can manage:
	<ul>
		<li>[<a href="<?php echo CHtml::encode($this->createUrl('booking/admin')) ?>"><b>BOOKINGS</b></a>]</li>
		<li>[<a href="<?php echo CHtml::encode($this->createUrl('service/admin')) ?>"><b>SERVICES</b></a>]</li>
		<li>[<a href="<?php echo CHtml::encode($this->createUrl('pax/admin')) ?>"><b>PAX</b></a>]</li>
	</ul>
</p>
