<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use kartik\bs4dropdown\Dropdown;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use kartik\nav\NavX;
//use kartik\sidenav\SideNav;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

   
    <!-- vuejs -->
	<link rel="stylesheet" href="/chartsqlserver/css/fontawesome.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="/chartsqlserver/css/jquery.mCustomScrollbar.min.css">
    
    <link
      type="text/css"
      rel="stylesheet"
      href="/chartsqlserver/css/bootstrap-vue.css"
    />

    <script
		  src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
		  integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
		  crossorigin="anonymous">
	</script>

    <script src="https://unpkg.com/vue@latest/dist/vue.js"></script>
    <script src="https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>
	

	<!-- Date-picker itself -->
	<script src="https://cdn.jsdelivr.net/npm/moment@2.22"></script>
	<script src="https://cdn.jsdelivr.net/npm/pc-bootstrap4-datetimepicker@4.17/build/js/bootstrap-datetimepicker.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/pc-bootstrap4-datetimepicker@4.17/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
	

	<!-- Lastly add this package -->
	<script src="https://cdn.jsdelivr.net/npm/vue-bootstrap-datetimepicker@5"></script>

	<!-- use the latest vue-select release -->
	<script src="https://unpkg.com/vue-select@latest"></script>
	<link rel="stylesheet" href="https://unpkg.com/vue-select@latest/dist/vue-select.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script>
	  // Initialize as global component
	  Vue.component('date-picker', VueBootstrapDatetimePicker);
	  Vue.component('v-select', VueSelect.VueSelect)
	</script>


</head>
<body>
<?php $this->beginBody() ?>


    <div class="wrapper d-flex align-items-stretch"> <!-- container -->
                <nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
					  <i class="fa fa-bars"></i>
					  <span class="sr-only">Toggle Menu</span>
					</button>
				</div>
				<div class="p-4">
		  			<h1><a href="/currency" class="logo">Currency <span>Exchange App</span></a></h1>
					<ul class="list-unstyled components mb-5">
					  <li class="active">
						<a href="/currency"><span class="fa fa-home mr-3"></span> Home</a>
					  </li>
					  <li>
						  <a href="/currency/conversion"><span class="fa fa-user mr-3"></span> Conversion</a>
					  </li>
					  <li>
					  <a href="/currency/history"><span class="fa fa-briefcase mr-3"></span> Exchange Rate History</a>
					  </li>
					  
					</ul>

				</div>
    		</nav>

			<!-- Page Content  -->
			<div id="content" class="p-4 p-md-5 pt-5">
				<?= Breadcrumbs::widget([
				'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
				]) ?>
				<?= Alert::widget() ?>
				<?php echo $content ?>
						
			</div>

    </div>



<!--
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Currency Exchange App <?= date('Y') ?></p>

        <p class="pull-right">Built with - MVC PHP Framework</p>
    </div>
</footer>
-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
