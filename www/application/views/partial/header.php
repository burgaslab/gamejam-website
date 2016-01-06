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
					<img src="<?= $this->path->base ?>resource/img/site/logo-3.png" style="max-width: 595px; width: 100%;"/>
				</div>
			</h1>
		</a>
		<h3 style="text-align: center; margin: 40px 10px;">Сайтът е в процес на обновяване.<br /> Stay tuned!</h3>
	</div>
</div>
