{extends "orga/base.tpl"}

{block "content"}
	<div class="orga settings">
		{if $success}
			<div class="success">
				<p>Промените са запазени.</p>
			</div>
		{/if}
		<form class="pure-form" method="post">
			{foreach $settings as $i}
				<label>{$i->desc}</label>
				<p><select name="setting[{$i->id}]"><option value="0" {selected !$i->value}>не</option><option value="1" {selected $i->value}>да</option></select></p>
			{/foreach}
			<div class="spacer"></div>
			<button type="submit" class="pure-button pure-button-primary">Запази</button>
		</form>
	</div>
{/block}
