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
				{if $i->name=="live-stream" || $i->name=="embed"}
				<p>
					<textarea name="setting[{$i->id}]" rows="" cols="" style="width: 500px; height: 100px;">{$i->value}</textarea>
				</p>
				{else}
				<p><select name="setting[{$i->id}]"><option value="0" {selected !$i->value}>не</option><option value="1" {selected $i->value}>да</option></select></p>
				{/if}
			{/foreach}
			<div class="spacer"></div>
			<button type="submit" class="pure-button pure-button-primary">Запази</button>
		</form>
	</div>
{/block}
