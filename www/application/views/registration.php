<!DOCTYPE html>
<html lang="en">
<head>
<title>Burgas Game Jam | започваме на 23 януари в Морското казино</title>
	<?php require_once("partial/head.php"); ?>
</head>
<body>
	<div class="container">
		<?php require_once("partial/header.php"); ?>

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
						<p class="col-lg-4"><input type="text" class="form-control" placeholder="Име и фамилия" name="name" value="<?= htmlspecialchars($data["name"]) ?>" /></p>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<div class="input-group validate email <?= $validator->has_error("email") ? "has-error":""?>">
								<span class="input-group-addon">@</span>
								<input type="text" class="form-control" placeholder="Имейл адрес" name="email" value="<?= htmlspecialchars($data["email"]) ?>" />
							</div>
						</div>
						<label>(ще бъде използван за връзка с вас)</label>
					</div>
					<div class="row">
						<div class="col-md-6 validate required <?= $validator->has_error("age") ? "has-error":""?>">
							<p style="margin: 5px 0 -5px 0;">възрастова група</p>
							<?php foreach ($age as $index=>$o) { ?>
							<label class="radio" for="age-<?=$index?>">
								<input type="radio" name="age" value="<?= htmlspecialchars($o) ?>" id="age-<?=$index?>" data-toggle="radio" <?= ($data["age"]==$o) ? 'checked="checked"' : "" ?> >
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
								<input type="radio" name="occupation" value="<?= htmlspecialchars($o) ?>" id="occupation-<?=$index?>" data-toggle="radio" <?= ($data["occupation"]==$o) ? 'checked="checked"' : "" ?> >
								<?= htmlspecialchars($o) ?>
							</label>
							<?php } ?>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="tagsinput-primary">
								<input type="text" class="tagsinput skills" placeholder="Умения" name="skills" value="<?= htmlspecialchars($data["skills"]) ?>" />
							</div>
						</div>
						<label>(разделени със запетая)</label>
					</div>
					<div class="row">
						<div class="col-md-8">
							<div class="bootstrap-switch-square validate required <?= $validator->has_error("agree") ? "has-error":""?>">
								<label><input type="checkbox" name="agree" <?= $data["agree"] ? 'checked="checked"' : ""?> data-toggle="switch" id="custom-switch-03" data-on-text="<span class='fui-check'></span>" data-off-text="<span class='fui-cross'></span>" />&nbsp;Наясно съм, че проектите се публикуват под <a href="http://creativecommons.org/" target="_blank">Creative commons лиценз</a> </label>
							</div>
						</div>
					</div>
					<button class="btn btn-primary" type="submit">Submit</button>
				</form>
				<?php } ?>
			</div>
		</div>


		<?php require_once("partial/footer.php"); ?>
	</div>
	<?php require_once("partial/javascript.php"); ?>
</body>
</html>