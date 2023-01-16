{extends "base.tpl"}

{block "content"}
<div class="orga votes">
	{if $open}
	
		<a id="general"></a>
		<h2>Най-добра игра</h2>
		<table class="grid">
			<tr>
				<th class="pos">позиция</th>
				<th>отбор</th>
				<th>игра</th>
				<th class="votes">брой гласове</th>
			</tr>
			{foreach $general as $i}
				<tr>
					<td>{$i@iteration}</td>
					<td>{$i->name}</td>
					<td>{$i->game}</td>
					<td>{$i->count}</td>
				</tr>
			{/foreach}
		</table>
		
		<a id="audience"></a>
		<h3>Награда на публиката</h3>
		<table class="grid">
			<tr>
				<th class="pos">позиция</th>
				<th>отбор</th>
				<th>игра</th>
				<th class="votes">брой гласове</th>
			</tr>
			{foreach $audience as $i}
				<tr>
					<td>{$i@iteration}</td>
					<td>{$i->name}</td>
					<td>{$i->game}</td>
					<td>{$i->count}</td>
				</tr>
			{/foreach}
		</table>
	{else}
		<div class="success">
			<p>Засега няма класиране :)</p>
		</div>
	{/if}
</div>
{/block}
