{extends "orga/base.tpl"}

{block "content"}
	<div class="orga codes">
		<form class="pure-form" method="post" action="{$current_path}">
			<div class="message">
				<p>Публични: {$normal_count} бр.</p>
				<p>Запазени за участници: {$reserved_count}</p>
			</div>
			{if isset($error)}
			<div class="message error">
				<p>{$error}</p>
			</div>
			{/if}
			<div class="spacer"></div>
			<button type="submit" class="pure-button pure-button-primary" name="action" value="generate">Генериране</button>
			<div class="spacer"></div>
			<button type="submit" class="pure-button pure-button-primary" name="action" value="clear">Изчистване</button>
			<div class="spacer"></div>
			<button type="submit" class="pure-button pure-button-primary" name="action" value="export">Експорт</button>
			<div class="spacer"></div>
			<button type="submit" class="pure-button pure-button-primary" name="action" value="send">Изпрати на участници</button>
			<div class="spacer"></div>
		</form>
	</div>
{/block}
