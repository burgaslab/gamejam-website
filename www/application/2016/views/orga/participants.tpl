{extends "orga/base.tpl"}

{block "content"}
	<div class="orga">
		<form method="get" action="#" class="pure-form filter">
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
			</div>
			<div class="column">
				<button type="submit" class="pure-button pure-button-primary">Търси &raquo;</button>
			</div>
		</form>
		<table class="grid pure-form" id="participants" data-edit-url="{$current_path}/edit" data-save-url="{$current_path}/save" data-cancel-url="{$current_path}/cancel" data-add-url="{$current_path}/add" data-delete-url="{$current_path}/delete">
			<thead>
			<tr>
				<th>име и фамилия</th>
				<th>имейл</th>
				<th>възраст</th>
				<th>заетост</th>
				<th>умения</th>
				<th>регистрация</th>
				<th>потвърден</th>
				<th>отбор</th>
				<th class="actions">действия</th>
			</tr>
			</thead>
			<tbody>
			
			{foreach $list as $i}
				<tr data-id="{$i->id}" class="edit">
					{include "orga/participant-row-view.tpl" item=$i}
				</tr>
			{/foreach}
			<tr class="add">
				{include "orga/participant-row-edit.tpl"}
			</tr>
			</tbody>
		</table>
	</div>
{/block}
