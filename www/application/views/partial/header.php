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
						<a href="<?= $this->path->base ?>what" class="dropdown-toggle" data-toggle="dropdown">Какво?<b class="caret"></b></a> <span class="dropdown-arrow"></span>
						<ul class="dropdown-menu">
							<li><a href="<?= $this->path->base ?>what#game-jam">Какво е Game Jam?</a></li>
							<li><a href="<?= $this->path->base ?>what#global-game-jam">Какво е Global Game Jam?</a></li>
							<li><a href="<?= $this->path->base ?>what#burgas-game-jam">Какво е Burgas Game Jam?</a></li>
						</ul></li>
					<li class="dropdown">
						<a href="<?= $this->path->base ?>rules" class="dropdown-toggle" data-toggle="dropdown">Правила<b class="caret"></b></a> 
						<span class="dropdown-arrow"></span>
						<ul class="dropdown-menu">
							<li><a href="<?= $this->path->base ?>rules#theme">Темата</a></li>
							<li><a href="<?= $this->path->base ?>rules#time">Време</a></li>
							<li><a href="<?= $this->path->base ?>rules#participate">Участие</a></li>
							<li><a href="<?= $this->path->base ?>rules#copyright">Интелектуални права</a></li>
						</ul></li>
					<li><a href="<?= $this->path->base ?>programme" >Програма</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<!-- <li><a class="btn btn-block btn-lg btn-success"  href="<?= $this->path->base ?>registration">Регистрирай се за участие</a></li> -->
					<li><a class="register"  href="<?= $this->path->base ?>registration">Регистрирай се за участие</a></li>
				</ul>
			</div>
		</nav>
	</div>
</div>
<div class="demo-headline demo-row trans-black">
	<a href="<?= $this->path->base ?>">
		<h1 class="demo-logo" style="">
			<div style="font-family: 'Courier New', monospace; font-size: 13px; line-height: normal;">
					<img src="<?= $this->path->base ?>resource/img/site/logo-3.png" />
				
			</div>
			<small style="text-align: left; font-size: 0.3em; margin-top: -70px; margin-left: 200px">23-25 януари 2015 <br />в Културен център “Морско Казино”
			</small>
		</h1>
	</a>
</div>


