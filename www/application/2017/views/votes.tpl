{extends "orga/base.tpl"}

{block "content"}
	<div class="orga votes">
		<ul class="cats">
			<li><a href="#general">Генерално класиране</a></li>
			{foreach $categories as $c}
				<li><a href="#{$c->name}">Класиране в категория "{$c->name}"</a></li>
			{/foreach}
		</ul>
	
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
		
	</div>
{/block}
