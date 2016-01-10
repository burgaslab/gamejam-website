<!DOCTYPE html>
<html>
<head>
	<title>title</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
{webresources bundle="public_css"}
{webresources bundle="public_js"}
{webresources icon="public"}

	
	<script src="resource/javascript/jquery-1.11.0.min.js" type="text/javascript"></script>
	<script src="resource/javascript/jquery.mosaicflow.min.js" type="text/javascript"></script>
	<script src="resource/javascript/jquery.swipebox.min.js" type="text/javascript"></script>
	<script src="resource/javascript/main.js" type="text/javascript"></script>
</head>
<body>
	<div id="page-wrap">
		<div id="side-nav">
			<img src="resource/image/public/logo.png" alt="" />
		</div>
		<div id="header" class="cf">
			<div class="wrap">
				<span class="mobile"><i class="fa fa-bars"></i></span>
				<nav>
					<ul>
						<li><a href="#">Home</a>
						<li class="active dropdown"><a href="#">Dropdown<i class="fa fa-caret-down"></i></a>
							<ul>
								<li><a href="#">Lorem ipsum dolor</a></li>
								<li><a href="#">Magna phasellus</a></li>
								<li><a href="#">Etiam dolore nisl</a></li>
								<li><a href="#">Phasellus consequat</a></li>
								<li><a href="#">Veroeros feugiat</a></li>
							</ul>
						</li>
						<li><a href="#">Left Sidebar</a></li>
						<li class="highlight"><a href="#">Right Sidebar</a></li>
						<li><a href="#">Two Sidebar</a></li>
						<li><a href="#">No Sidebar</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
				</nav>
				<div class="logo">
					<div class="logo-wrap">
						<img src="resource/image/public/logo.png" class="pure-img" alt="" />
						<p>29-31 януари 2016<br/>в Културен център “Морско Казино”</p>
					</div>
				</div>
			</div>
		</div>
		<div id="content">
			<div class="wrap">
				{block "content"}{/block}
			</div>
		</div>
		<div id="footer">
			<div class="wrap">
				<div class="partners">
					<h3>С подрепата на: </h3>
					<ul class="assets">
						<li><a href="#"><img src="temp.jpg" alt="" /></a></li>
						<li><a href="#"><img src="temp.jpg" alt="" /></a></li>
						<li><a href="#"><img src="temp.jpg" alt="" /></a></li>
						<li><a href="#"><img src="temp.jpg" alt="" /></a></li>
						<li><a href="#"><img src="temp.jpg" alt="" /></a></li>
						<li><a href="#"><img src="temp.jpg" alt="" /></a></li>
					</ul>
				</div>
				<div class="contacts">
					<h3>Контакти:</h3>
					<div class="pure-g">
						<div class="pure-u-1 pure-u-sm-1-4">
							<a href="#" class="support">Подкрепи Burgas Game Jam 2016</a>
						</div>
						<div class="pure-u-1 pure-u-sm-1-4">
							<p><a href="mailto:gamejam@burgaslab.org">gamejam@burgaslab.org</a></p>
							<p>организатор: <a href="http://burgaslab.org">BurgasLab</a></p>
						</div>
						<div class="pure-u-1 pure-u-sm-1-4">
							<p><a href="#"><i class="fa fa-facebook"></i>събитието във фейсбук</a></p>
							<p><a href="#">локация</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>