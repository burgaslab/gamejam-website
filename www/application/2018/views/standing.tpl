{extends "base.tpl"}

{block "content"}
<div class="orga votes">
	{if $open}
		{*
		<ul class="cats">
			<li><a href="#general">Генерално класиране</a></li>
			{foreach $categories as $c}
				<li><a href="#{$c->name}">Класиране в категория "{$c->name}"</a></li>
			{/foreach}
			<li><a href="#audience">Награда на публиката</a></li>
		</ul>
		*}
	
		<a id="general"></a>
		<h2>Генерално класиране</h2>
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
		
		{foreach $categories as $c}
			<a id="{$c->name}"></a>
			<h3>Категория "{$c->name}" - {$c->desc}</h3>
			<table class="grid">
				<tr>
					<th class="pos">позиция</th>
					<th>отбор</th>
					<th>игра</th>
					<th class="votes">брой гласове</th>
				</tr>
				{foreach $c->standing as $i}
					<tr>
						<td>{$i@iteration}</td>
						<td>{$i->name}</td>
						<td>{$i->game}</td>
						<td>{$i->count}</td>
					</tr>
				{/foreach}
			</table>
		{/foreach}
		
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
