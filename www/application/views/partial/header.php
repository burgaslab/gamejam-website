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
					<li class="dropdown">
						<a href="<?= $this->path->base ?>what" class="dropdown-toggle <?= $this->method=="what" ? "active" : ""?>" data-toggle="dropdown">Какво?<b class="caret"></b></a> <span class="dropdown-arrow"></span>
						<ul class="dropdown-menu">
							<li><a href="<?= $this->path->base ?>what#game-jam">Какво е Game Jam?</a></li>
							<li><a href="<?= $this->path->base ?>what#global-game-jam">Какво е Global Game Jam?</a></li>
							<li><a href="<?= $this->path->base ?>what#burgas-game-jam">Какво е Burgas Game Jam?</a></li>
						</ul></li>
					<li class="dropdown">
						<a href="<?= $this->path->base ?>rules" class="dropdown-toggle <?= $this->method=="rules" ? "active" : ""?>" data-toggle="dropdown">Правила<b class="caret"></b></a>
						<span class="dropdown-arrow"></span>
						<ul class="dropdown-menu">
							<li><a href="<?= $this->path->base ?>rules#theme">Темата</a></li>
							<li><a href="<?= $this->path->base ?>rules#time">Време</a></li>
							<li><a href="<?= $this->path->base ?>rules#participate">Участие</a></li>
							<li><a href="<?= $this->path->base ?>rules#copyright">Авторски права</a></li>
						</ul></li>
					<li><a href="<?= $this->path->base ?>programme" class="<?= $this->method=="programme" ? "active" : ""?>">Програма</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<!-- <li><a class="btn btn-block btn-lg btn-success"  href="<?= $this->path->base ?>registration">Регистрирай се за участие</a></li> -->
					<li><a class="register <?= $this->method=="registration" ? "active" : ""?>"  href="<?= $this->path->base ?>registration">Регистрирай се за участие</a></li>
				</ul>
			</div>
		</nav>
	</div>
</div>
<div class="demo-headline row trans-black">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
		<a href="<?= $this->path->base ?>">
			<h1 class="demo-logo">
				<div style="font-family: 'Courier New', monospace; font-size: 13px; line-height: normal;">
					<img src="<?= $this->path->base ?>resource/img/site/logo-3.png" />
				</div>
				<div class="" style="margin-top: -55px; margin-left: 200px">

					<div class="info-host">
						23-25 януари 2015
					</div>
					<div class="info-host">
						в Културен център “Морско Казино”<br />
					</div>
					<!-- <div class="info-host">
						Домакин: <a href="http://burgaslab.org" ><img src="<?= $this->path->base ?>resource/img/site/logo_burgaslab.png" style="width:80px;" /></a>
					</div> -->
				</div>

			</h1>
		</a>
	</div>
</div>


