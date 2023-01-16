{extends "orga/base.tpl"}

{block "content"}
	<div class="orga settings">
		{if $success}
			<div class="success">
				<p>Промените са запазени.</p>
			</div>
		{/if}
		<form class="pure-form" method="post">
			<label>HTML заглавие</label>
			<p>
				<input name="model[title]" type="text" value="{$model->title}" style="width: 100%" />
			</p>
			<label>Текст</label>
			<p>
				<textarea name="model[text]" rows="" cols="" class="tinymce">{$model->text}</textarea>
			</p>
			<div class="spacer"></div>
			<button type="submit" class="pure-button pure-button-primary">Запази</button>
			<button type="submit" class="pure-button pure-button-primary" name="close" value="1">Запази и затвори</button>
		</form>
	</div>
{/block}
