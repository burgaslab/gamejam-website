<!DOCTYPE html>
<html lang="en">
<head>
<title>Burgas Game Jam | започваме на 23 януари в Морското казино</title>
	<?php require_once("partial/head.php"); ?>
</head>
<body>
	<div class="container">
		<?php require_once("partial/header.php"); ?>

		
		<div class="row" >
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="inner-container trans-black">
				
					<h1 style="margin: 0px 0px 1em 0px; text-align: center; ">Регистрация</h1>	
					<hr />
				<?php if ($is_success) { ?>
					<div class="alert alert-success" role="alert">
						<p>Вашата регистрация за Burgas Game Jam беше успешна!</p>
					</div>
				<?php } else { ?>
					<form method="post" action="#" class="reg">
						<div class="row demo-row validate required <?= $validator->has_error("name") ? "has-error":""?>">
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<input type="text" class="form-control" placeholder="Име и фамилия" name="name" value="<?= htmlspecialchars($data["name"]) ?>" />
								<br/>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<div class="input-group validate email <?= $validator->has_error("email") ? "has-error":""?>">
									<span class="input-group-addon">@</span>
									<input type="text" class="form-control" placeholder="Имейл адрес" name="email" value="<?= htmlspecialchars($data["email"]) ?>" />
								</div>
								<label>(ще бъде използван за връзка с вас)</label>
							</div>
							
						</div>
			
						<div class="row demo-row">
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 validate required <?= $validator->has_error("age") ? "has-error":""?>">
								<p style="margin: 5px 0 -5px 0;">Възрастова група</p>
								<?php foreach ($age as $index=>$o) { ?>
								<label class="radio" for="age-<?=$index?>">
									<input type="radio" name="age" value="<?= htmlspecialchars($o) ?>" id="age-<?=$index?>" data-toggle="radio" <?= ($data["age"]==$o) ? 'checked="checked"' : "" ?> >
									<?= htmlspecialchars($o) ?>
								</label>
								<?php } ?>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 validate required <?= $validator->has_error("occupation") ? "has-error":""?>">
								<p style="margin: 5px 0 -5px 0;">Заетост</p>
								<?php foreach ($occupation as $index=>$o) { ?>
								<label class="radio" for="occupation-<?=$index?>">
									<input type="radio" name="occupation" value="<?= htmlspecialchars($o) ?>" id="occupation-<?=$index?>" data-toggle="radio" <?= ($data["occupation"]==$o) ? 'checked="checked"' : "" ?> >
									<?= htmlspecialchars($o) ?>
								</label>
								<?php } ?>
							</div>
						</div>

						<div class="row demo-row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="tagsinput-primary">
									<input type="text" class="tagsinput skills form-control" placeholder="Умения" name="skills" value="<?= htmlspecialchars($data["skills"]) ?>" />
									<label>(разделени със запетая)</label>
								</div>
								
							</div>
						</div>
						<div class="row demo-row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="bootstrap-switch-square validate required <?= $validator->has_error("agree") ? "has-error":""?>">
									<label><input type="checkbox" name="agree" <?= $data["agree"] ? 'checked="checked"' : ""?> data-toggle="switch" id="custom-switch-03" data-on-text="<span class='fui-check'></span>" data-off-text="<span class='fui-cross'></span>" />&nbsp;Наясно съм, че проектите се публикуват под <a href="http://creativecommons.org/" target="_blank">Creative commons лиценз</a> </label>
								</div>
							</div>
						</div>
						<div class="row demo-row">
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<button class="navbar-brand btn btn-primary btn-lg btn-block btn-warning" type="submit">Регистрирай ме!</button>
							</div>
						</div>
					</form>
					<?php } ?>
				</div>
			</div>
		</div>


		<?php require_once("partial/footer.php"); ?>
	</div>
	<?php require_once("partial/javascript.php"); ?>
</body>
</html>