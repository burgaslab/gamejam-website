<div class="row ">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<nav class="navbar navbar-inverse navbar-embossed" role="navigation">
			<a href="<?= $this->path->base ?>.." class="current">&larr; Обратно към BGJ 2025</a>
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
						</ul>
					</li>
					<li class="dropdown">
						<a href="<?= $this->path->base ?>programme#day1" class="dropdown-toggle <?= $this->method=="programme" ? "active" : ""?>" data-toggle="dropdown">Програма<b class="caret"></b></a>
						<span class="dropdown-arrow"></span>
						<ul class="dropdown-menu">
							<li><a href="<?= $this->path->base ?>programme#day1">Ден 1 - Петък</a></li>
							<li><a href="<?= $this->path->base ?>programme#day2">Ден 2 - Събота</a></li>
							<li><a href="<?= $this->path->base ?>programme#day3">Ден 3 - Неделя</a></li>
							<li><a href="<?= $this->path->base ?>programme#speakers">Лектори</a></li>
						</ul>
					</li>
					<li>
						<a href="<?= $this->path->base ?>jammers" class="dropdown-toggle register <?= $this->method=="jammers" ? "active" : ""?>">За Jammer-и</a>
					</li>
					<!--
						<li class="dropdown">
							<a class="register <?= $this->method=="registration" ? "active" : ""?>"  href="<?= $this->path->base ?>registration">Регистрирай се за участие</a>
						</li>
					-->
					<li class="dropdown">
						<a class="<?= $this->method=="gallery" ? "active" : ""?>"  href="<?= $this->path->base ?>gallery">Снимки</a>
					</li>
					<li class="dropdown">
						<a class="<?= $this->method=="review" ? "active" : ""?>"  href="<?= $this->path->base ?>review">Ревю</a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Архив<b class="caret"></b></a> <span class="dropdown-arrow"></span>
						<ul class="dropdown-menu">
							<li><a href="<?= $this->path->base ?>/../../2015">Burgas Game Jam 2015</a></li>
							<li><a href="<?= $this->path->base ?>/../../2016">Burgas Game Jam 2016</a></li>
							<li><a href="<?= $this->path->base ?>/../../2017">Burgas Game Jam 2017</a></li>
							<li><a href="<?= $this->path->base ?>/../../2018">Burgas Game Jam 2018</a></li>
							<li><a href="<?= $this->path->base ?>/../../2019">Burgas Game Jam 2019</a></li>
							<li><a href="<?= $this->path->base ?>/../../2020">Burgas Game Jam 2020</a></li>
							<li><a href="<?= $this->path->base ?>/../../2023">Burgas Game Jam 2023</a></li>
							<li><a href="<?= $this->path->base ?>/../../2024">Burgas Game Jam 2024</a></li>
						</ul></li>
				</ul>
			</div>
		</nav>
	</div>
</div>
<div class="demo-headline row trans-black">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
		<a href="<?= $this->path->base ?>">
			<h1 class="demo-logo">
				<div style="width: 100%; margin: 0px auto; max-width: 595px;">
					<img src="<?= $this->path->base ?>resource/img/site/logo-3.png" style="max-width: 595px; width: 100%;"/>
					<div class="info-host">
							23-25 януари 2015 <br/>
							в Културен център “Морско Казино”
					</div>
				</div>
			</h1>
		</a>
	</div>
</div>
