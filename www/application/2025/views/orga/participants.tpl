{extends "orga/base.tpl"}

{block "content"}
	<div class="orga">
		<form method="get" action="{$current_path}" class="pure-form filter">
			<div class="column">
				<label>Търсене</label>
				<input type="text" name="term" value="{$filter.term}" />
			</div>
			<div class="column">
				<label>Потвърден</label>
				<select name="confirmed">
					<option value="-1">без значение</option>
					{foreach $opt_bool as $i}
						<option value="{$i@key}" {selected $i@key==$filter.confirmed}>{$i}</option>
					{/foreach}
				</select>
			</div>
			<div class="column">
				<label>Отбор</label>
				<select name="team_id">
					<option value="">всички...</option>
					{foreach $teams as $i}
						<option value="{$i->id}" {selected $i->id==$filter.team_id}>{$i->name} ({$i->game})</option>
					{/foreach}
				</select>
			</div>
			<div class="column">
				<button type="submit" class="pure-button pure-button-primary">Търси &raquo;</button>
			</div>
		</form>
		<table class="grid pure-form sort add-counter" data-edit-url="{$current_path}/edit" data-save-url="{$current_path}/save" data-cancel-url="{$current_path}/cancel" data-add-url="{$current_path}/add" data-delete-url="{$current_path}/delete">
			<thead>
			<tr>
				<th>#</th>
				<th class="sort">име и фамилия</th>
				<th class="sort">имейл</th>
				<th class="sort">възраст</th>
				<th class="sort">заетост</th>
				<th class="sort">умения</th>
				<th class="sort">размер тениска</th>
				<th class="sort">регистрация</th>
				<th class="sort">потвърден</th>
				<th class="sort">отбор</th>
				<th class="actions">действия</th>
			</tr>
			</thead>
			<tbody>
			
			{foreach $list as $i}
				<tr data-id="{$i->id}" class="edit">
					{include "orga/participant-row-view.tpl" item=$i}
				</tr>
			{/foreach}
			<tfoot>
			<tr class="add">
				{include "orga/participant-row-edit.tpl"}
			</tr>
			</tfoot>
			</tbody>
		</table>
	</div>
{/block}
