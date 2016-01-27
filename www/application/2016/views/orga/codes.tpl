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
			<button type="submit" class="pure-button pure-button-primary" name="action" value="assign">Зачисли кодове на участници</button>
			<div class="spacer"></div>
			<button type="submit" class="pure-button pure-button-primary" name="action" value="list">Списък с кодове на участници</button>
			<div class="spacer"></div>
			<button type="submit" class="pure-button pure-button-primary" name="action" value="send">Изпрати на участници</button>
			<div class="spacer"></div>
		</form>
		{if isset($list)}
			<table class="grid pure-form sort">
				<thead>
				<tr>
					<th class="sort">id</th>
					<th class="sort">име</th>
					<th class="sort">имейл</th>
					<th class="sort">отбор</th>
					<th class="sort">код</th>
				</tr>
				</thead>
				<tbody>
				
				{foreach $list as $i}
					<tr>
						<td>{$i.id}</th>
						<td>{$i.name}</th>
						<td>{$i.email}</th>
						<td>{$i.team_id}</th>
						<td><a href="{$i.url}" target="_blank">{$i.code}</a></th>
					</tr>
				{/foreach}
				</tbody>
			</table>
		{/if}
	</div>
{/block}
