{extends "base.tpl"}

{block "content"}
<div class="richtext">
<h1>Галерия</h1>
{*
	<h2>Pellentesque quis elit non lectus gravida blandit</h2>
	<p>Aliquam libero. Vivamus nisl nibh, iaculis vitae, viverra sit amet, ullamcorper vitae, turpis. </p>
</div>
*}
<ul class="assets gallery">
	{foreach $gallery.photos as $i}
	<li><a href="{$gallery.dir}{$i}"><img src="{$gallery.thumb_dir}{$i}" alt="" /></a></li>
	{/foreach}
</ul>
{/block}