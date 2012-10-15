<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="language" content="en" />

  <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/favicon.ico" type="image/x-icon" >

  <!-- blueprint CSS framework -->
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" media="screen, projection" />
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/print.css" media="print" />
  <!--[if lt IE 8]>
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
  <![endif]-->

  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />

  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/modernizr-2.0.6.min.js"></script>

  <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="wrapper">

  <header id="header">
    <!-- div id="logo"><?php // echo CHtml::link(CHtml::encode(Yii::app()->name), Yii::app()->baseURL); ?></div> -->
    <div id="logo"><?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/img/logo_tol.png"), Yii::app()->baseURL); ?></div>

    <nav id="mainmenu">
      <?php
        $mainMenuItems = array(
          // array('label'=>'Home', 'url'=>array('/site/index')),
          array('label'=>'Activities', 'url'=>array('/activity/admin')),
          array('label'=>'Assignments', 'url'=>array('/assignment/admin')),
          array('label'=>'Activity Types', 'url'=>array('/activitytype/admin')),
          array('label'=>'Operations Info', 'url'=>array('/site/page', 'view'=>'operationsinfo',)),
          // array('label'=>'Users', 'url'=>array('/user/admin')),
          // array('label'=>'Contact', 'url'=>array('/site/contact')),
          // array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
          // array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
        );
      ?>
      <?php $this->widget('zii.widgets.CMenu',array(
        'items'=>$mainMenuItems,
        'firstItemCssClass'=>'first',
        'lastItemCssClass'=>'last',
      )); ?>
    </nav><!-- mainmenu -->
  </header><!-- header -->

  <div id="main-wrapper"><div id="main" role="main">
    <?php echo $content; ?>
  </div></div><!-- main -->

  <footer id="footer">
    <nav id="footermenu">
      <?php 
        $footerMenuItems = array(
          array('label'=>'Home', 'url'=>array('/site/index')),
          // array('label'=>'Activities', 'url'=>array('/activity/admin')),
          // array('label'=>'Activity Types', 'url'=>array('/activitytype/admin')),
          array('label'=>'Employees', 'url'=>array('/employee/admin')),
          // array('label'=>'Operations Info', 'url'=>array('/site/page', 'view'=>'operationsinfo',)),
          array('label'=>'Users', 'url'=>array('/user/admin')),
          array('label'=>'Contact', 'url'=>array('/site/contact')),
          array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
          array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
        );
      ?>
      <?php $this->widget('zii.widgets.CMenu',array('items'=>$footerMenuItems)); ?>
    </nav>
    <div class="content">
    Copyright &copy; <?php echo date('Y'); ?> by <a href="http://www.arckanto.com" target=_blank>Arckanto software</a>
      for <a href="http://www.costaricaexpeditions.com" target=_blank>Costa Rica Expeditions</a>.<br/>
      All Rights Reserved.<br/>
      <?php echo Yii::powered(); ?>
    </div>
  </footer><!-- footer -->

</div><!-- wrapper -->

</body>
</html>
