{extends "orga/base.tpl"}

{block "content"}
	<div class="orga">
		<table class="grid pure-form sort" data-edit-url="{$current_path}/edit" data-save-url="{$current_path}/save" data-cancel-url="{$current_path}/cancel" data-add-url="{$current_path}/add" data-delete-url="{$current_path}/delete">
			<thead>
			<tr>
				<th class="sort">име</th>
				<th class="sort">игра</th>
				<th class="actions">действия</th>
			</tr>
			</thead>
			<tbody>
			
			{foreach $list as $i}
				<tr data-id="{$i->id}" class="edit">
					{include "orga/team-row-view.tpl" item=$i}
				</tr>
			{/foreach}
			<tfoot>
			<tr class="add">
				{include "orga/team-row-edit.tpl"}
			</tr>
			</tfoot>
			</tbody>
		</table>
	</div>
{/block}
