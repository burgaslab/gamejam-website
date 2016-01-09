<?php
	require_once("app/controller/registration.php");
	
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Burgas Game Jam | започваме на 23 януари в Морското казино</title>
    <meta name="description" content="Flat UI Kit Free is a Twitter Bootstrap Framework design and Theme, this responsive framework includes a PSD and HTML version."/>

    <meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="dist/css/vendor/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="dist/css/flat-ui.css" rel="stylesheet">
    <link href="docs/assets/css/demo.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/favicon.ico">
<style>
  p.indented {
    padding-left: 70px;
  }
  .inspiration {
    font-size: 1.5em;
    clear: both;
    line-height: 3em;
  }
  .inspiration.left > span {
    /*float: left;*/
  }
  .inspiration.right > span {
    /*float: right;*/
  }
  .inspiration span {
    padding: 7px;
    background: rgba(255, 184, 0, 0.2);
  }
  .inspiration span.badge {
    display: inline-block;
    background: #DB9006;

    width: 60px;
    height: 60px;
    padding: 10px;
    border-radius: 50%;
    font-size: 1em;
  }
</style>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="dist/js/vendor/html5shiv.js"></script>
      <script src="dist/js/vendor/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">

      <div class="row demo-row">
        <div class="col-xs-12">
          <nav class="navbar navbar-inverse navbar-embossed" role="navigation">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
                <span class="sr-only">Toggle navigation</span>
              </button>
              <!--<a class="navbar-brand" href="#">Flat UI</a>-->
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-01">
              <ul class="nav navbar-nav navbar-left">
                <li><a href="#fakelink">Начало</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">За Game Jam-а<b class="caret"></b></a>
                  <span class="dropdown-arrow"></span>
                  <ul class="dropdown-menu">
                    <li><a href="#">Какво е Burgas Game Jam?</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Какво е Global Game Jam?</a></li>
                    <li><a href="#">Какво е Game Jam?</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Правила<b class="caret"></b></a>
                  <span class="dropdown-arrow"></span>
                  <ul class="dropdown-menu">
                    <li><a href="#">Темата</a></li>
                    <li><a href="#">Продължителност</a></li>
                    <li><a href="#">Участие</a></li>
                    <li><a href="#">Интелектуални права</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" data-toggle="dropdown">Програма</a>

                </li>
              </ul>
               <ul class="nav navbar-nav navbar-right">
                <li><a class="btn btn-block btn-lg" style="color: #fff; background: rgba(240, 4, 4, 0.1)" href="registration">Регистрирай се за участие</a></li>
               </ul>
            </div><!-- /.navbar-collapse -->
          </nav><!-- /navbar -->
        </div>
      </div> <!-- /row -->

      <h1>Регистрация</h1>
      <div class="row" >
				<div class="col-xs-16">
					<?php if ($is_success) { ?>
					<div class="alert alert-success" role="alert">
						<p>Вашата регистрация за Burgas Game Jam беше успешна!</p>
					</div>
					<?php } else { ?>
					<form method="post" action="#" class="reg">
						<div class="row validate required <?= $validator->has_error("name") ? "has-error":""?>">
							<p class="col-lg-4"><input type="text" class="form-control" placeholder="Име и фамилия" name="name" value="<?= htmlspecialchars($model["name"]) ?>" /></p>
						</div>
						<div class="row">
							<div class="col-lg-4">
								<div class="input-group validate email <?= $validator->has_error("email") ? "has-error":""?>">
									<span class="input-group-addon">@</span>
									<input type="text" class="form-control" placeholder="Имейл адрес" name="email" value="<?= htmlspecialchars($model["email"]) ?>" />
								</div>
							</div>
							<label>(ще бъде използван за връзка с вас)</label>
						</div>
						<div class="row">
							<div class="col-md-6 validate required <?= $validator->has_error("age") ? "has-error":""?>">
								<p style="margin: 5px 0 -5px 0;">възрастова група</p>
								<?php foreach ($age as $index=>$o) { ?>
								<label class="radio" for="age-<?=$index?>">
									<input type="radio" name="age" value="<?= htmlspecialchars($o) ?>" id="age-<?=$index?>" data-toggle="radio" <?= ($model["age"]==$o) ? 'checked="checked"' : "" ?> >
									<?= htmlspecialchars($o) ?>
								</label>
								<?php } ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 validate required <?= $validator->has_error("occupation") ? "has-error":""?>">
								<p style="margin: 5px 0 -5px 0;">заетост</p>
								<?php foreach ($occupation as $index=>$o) { ?>
								<label class="radio" for="occupation-<?=$index?>">
									<input type="radio" name="occupation" value="<?= htmlspecialchars($o) ?>" id="occupation-<?=$index?>" data-toggle="radio" <?= ($model["occupation"]==$o) ? 'checked="checked"' : "" ?> >
									<?= htmlspecialchars($o) ?>
								</label>
								<? } ?>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="tagsinput-primary">
									<input type="text" class="tagsinput skills" placeholder="Умения" name="skills" value="<?= htmlspecialchars($model["skills"]) ?>" />
								</div>
							</div>
							<label>(разделени със запетая)</label>
						</div>
						<div class="row">
							<div class="col-md-8">
								<div class="bootstrap-switch-square validate required <?= $validator->has_error("agree") ? "has-error":""?>">
									<label><input type="checkbox" name="agree" <?= $model["agree"] ? 'checked="checked"' : ""?> data-toggle="switch" id="custom-switch-03" data-on-text="<span class='fui-check'></span>" data-off-text="<span class='fui-cross'></span>" />&nbsp;Наясно съм, че проектите се публикуват под <a href="http://creativecommons.org/" target="_blank">Creative commons лиценз</a> </label>
								</div>
							</div>
						</div>
						<button class="btn btn-primary" type="submit">Submit</button>
					</form>
					<?php } ?>
				</div>
			</div>


    <footer style="background: rgba(51, 52, 45, 0.3);">
      <div class="container">
        <div class="row">
          <div class="col-xs-7">
            <!--Домакин е бургаският хакерспейс <br /><a href="http://burgaslab.org"><img src="../logo_burgaslab.png" /></a>-->

          </div> <!-- /col-xs-7 -->

          <div class="col-xs-5">
            <!--<div class="footer-banner"></div>-->
          </div>
        </div>
      </div>
    </footer>

    <script src="dist/js/vendor/jquery.min.js"></script>
    <!--<script src="dist/js/vendor/video.js"></script>-->
    <script src="dist/js/flat-ui.min.js"></script>
    <script src="js/form-validator.js"></script>
    <!--<script src="docs/assets/js/application.js"></script>-->

		<style>
		.has-error { color: #f00; }
		</style>
    <script>
			$(':radio, :checkbox').radiocheck();
			$('[data-toggle="switch"]').bootstrapSwitch();;
			
      $('input.skills').tagsinput();

			$("form.reg").formValidator({errorClass:"has-error"});
    </script>
    <!--<script>-->
    <!--  videojs.options.flash.swf = "dist/js/vendors/video-js.swf"-->
    <!--</script>-->
  </body>
</html>
