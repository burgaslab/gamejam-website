{extends "orga/base.tpl"}

{block "content"}
	<div class="orga">
		{if $success}
			<div class="success">
				<p>Промените са запазени.</p>
			</div>
		{/if}
		<table class="grid pure-form sort">
			<thead>
			<tr>
				<th class="sort">страница</th>
				<th class="actions">действия</th>
			</tr>
			</thead>
			<tbody>
			
			{foreach $pages as $i}
				<tr class="edit">
					<td><a href="{$current_path}/edit/{$i->name}">{$i->title}</a></td>
					<td><a href="{$current_path}/edit/{$i->name}"><i class="fa fa-edit"></i></a></td>
				</tr>
			{/foreach}
			</tbody>
		</table>
	</div>
{/block}
