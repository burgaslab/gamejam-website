{extends "base.tpl"}

{block "content"}
<div class="registration">
	<form method="post" action="#" class="pure-form pure-form-stacked">
		<h1>Pellentesque quis elit non lectus gravida blandit</h1>
		<div class="pure-g">
			<div class="pure-u-1 pure-u-sm-1-2">
				<input class="pure-input-1" type="text" placeholder="Name" required />
			</div>
			<div class="pure-u-1 pure-u-sm-1-2">
				<input class="pure-input-1" type="text" placeholder="E-mail" required />
				<em>Ще бъде използван за връзка с вас</em>
			</div>
			<div class="pure-u-1 pure-u-sm-1-2">
				<p class="label">Възрастова група</p>
				<label><input type="radio">12-16г.</label>
				<label><input type="radio">12-16г.</label>
				<label><input type="radio">12-16г.</label>
			</div>
			<div class="pure-u-1 pure-u-sm-1-2">
				<p class="label">Заетост</p>
				<label><input type="radio">ученик</label>
				<label><input type="radio">ученик</label>
				<label><input type="radio">ученик</label>
			</div>
			<div class="pure-u-1">
				<input class="pure-input-1" type="text" placeholder="Умения" />
				<em>Разделени със запетая</em>
			</div>
			<div class="pure-u-1">
				<label><input type="checkbox" />&nbsp;Наясно съм, че проектите се публикуват под <a href="#">Creative commons лиценз <i class="fa fa-exclamation-circle"></i></a></label>
			</div>
			<div class="pure-u-1">
				<button type="submit" class="pure-button pure-button-primary">Send Message</button>
			</div>
		</div>
	</form>
</div>
{/block}