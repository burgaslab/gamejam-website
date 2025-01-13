{extends "orga/base.tpl"}

{block "content"}
	<div class="orga">
		<form method="post" action="#" class="pure-form pure-form-stacked">
			<input type="hidden" name="login" value="1" /> 
			<h1>Моля, въведете потребителско име и парола:</h1>
			{if isset($error)}
				<div class="error">
					<strong>Грешка:</strong> Въведеното потребителско име или парола са грешни. Моля, въведете вашите данни отново.
				</div>
			{/if}
			<label>Потребителско име:</label>
			<p><input type="text" name="username" value="{$username}" class="username" /></p>
			<label>Парола:</label>
			<p><input type="password" name="password" class="password" /></p>
			<p><button type="submit" class="pure-button pure-button-primary">Вход</button></p>
		</form>
	</div>

{/block}
