<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#" lang="bg">
<head>
<title>Burgas Game Jam 2016</title>

<meta property="og:image" content="<?php echo $this->config->base_url() ?>resource/image/facebook.png" />
<meta charset="utf-8">
<meta name="description" content="За втора поредна година Бургас ще е част от световното гейм събитие Global Game Jam!" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="<?= $this->path->base ?>resource/uc/image/favicon.ico">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,500,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
<link href="<?= $this->path->base ?>resource/uc/css/bootstrap.min.css" rel="stylesheet">
<link href="<?= $this->path->base ?>resource/uc/css/flat-ui.css" rel="stylesheet">
<link href="<?= $this->path->base ?>resource/uc/css/app.css" rel="stylesheet">

</head>
<body>
	<div class=" container">
	<div class="row ">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<nav class="navbar navbar-inverse navbar-embossed" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
						<span class="sr-only">Toggle navigation</span>
					</button>
				</div>
				<div class="collapse navbar-collapse" id="navbar-collapse-01">
					<ul class="nav navbar-nav navbar-left">
						<li>
							<a href="<?= $this->path->base ?>" class="<?= $this->method=="index" ? "active" : ""?>" >Начало</a>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-left">
						<li class="dropdown">
							<a class="" href="<?= $this->path->base ?>2015">Събитието през 2015та</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<div class="demo-headline row trans-black">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
			<h3 style="text-align: center; margin: 40px 10px;">Burgas Game Jam 2016: 29-31 януари<br /> Очаквайте подробности!</h3>
			<h4 style="text-align: center; font-size: 22px"><a class="" style="text-decoration: underline;" href="<?= $this->path->base ?>2015">Повече информация за Burgas Game Jam 2015</a></h4>
			<a href="<?= $this->path->base ?>">
				<h1 class="demo-logo">
					<div style="width: 100%; margin: 0px auto; max-width: 595px;">
						<img src="<?= $this->path->base ?>resource/uc/image/logo.png" style="max-width: 595px; width: 100%;"/>
					</div>
				</h1>
			</a>
			<h3 style="text-align: center; margin: 40px 10px;">Сайтът е в процес на обновяване.<br /> Stay tuned!</h3>
		</div>
	</div>

		<div class="row demo-row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div style="text-align: center;" class="trans-black">
					Организатор: <br />
					<a href="http://burgaslab.org" target="_blank"><img src="<?= $this->path->base ?>resource/uc/image/burgaslab.png" /></a>
					<br />
					<br />
					<br />
				</div>
			</div>
		</div>
		<footer style="" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 jumbotron">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
						<a href="<?= $this->path->base ?>support" class="btn btn-primary btn-hg btn-warning btn-wrap" style="width: 100%;" >Подкрепи <br />Burgas Game Jam</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							Контакти:
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<a href="mailto:gamejam@burgaslab.org?Subject=Donation" target="_top">gamejam@burgaslab.org</a> <br />
								Организатор: <a href="http://burgaslab.org" target="_blank">BurgasLab</a>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<a href="https://www.facebook.com/events/759492127470937/" target="_blank"><span class="fui-facebook" ></span> facebook събитие</a><br />
								<a href="https://www.facebook.com/BurgasGamJam" target="_blank"><span class="fui-facebook" ></span> facebook страница</a>
								<br />
								<a href="https://twitter.com/search?f=realtime&q=%23bgj2015&src=typd" target="_blank"><span class="fui-twitter" ></span> #bgj2015</a><br />
							</div>
						</div>
					</div>
				</div>
			</div>
			<br />
		</footer>

	</div>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-58643489-1', 'auto');
		ga('send', 'pageview');
	</script>
</body>
</html>
