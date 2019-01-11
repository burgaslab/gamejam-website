<!DOCTYPE html>
<html data-root="{$base}">
<head>
	<title>{$html_title}</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta property="og:image" content="{$http_base}resource/image/public/facebook.png" />
{block "bundle"}
{webresources bundle="public_css"}
{webresources bundle="public_js"}
{webresources icon="public"}
{/block}
</head>
<body>
	<div id="page-wrap">
		<div id="side-nav">
			<img src="{$base}resource/image/public/header.png" alt="" />
		</div>
		<div id="header" class="cf">
			<div class="wrap">
				<span class="mobile"><i class="fa fa-bars"></i></span>
				<nav>
					<ul>
						{strip}
						{foreach $nav as $i}
							{assign var="children" value=((isset($i->sub)) ? $i->sub : array())}
							<li class="{$i->css|default} {if $children}dropdown{/if}"><a href="{$base}{$i->url}">{$i->title}{if $children}<i class="fa fa-caret-down"></i>{/if}</a>
								{if $children}
								<ul>
									{foreach $children as $j}
									<li><a href="{$base}{$j->url}">{$j->title}</a></li>
									{/foreach}
								</ul>
								{/if}
							</li>
						{/foreach}
						{/strip}
					</ul>
				</nav>
				{block "logo"}
				<div class="logo">
					<div class="logo-wrap">
						<a href="{$base}"><img src="{$base}resource/image/public/header.png" class="pure-img" alt="Burgas Game Jam 2019" /></a>
						<p style="display: none">25-26-27 януари 2019<br/>в Експозиционен център “Флора”</p>
					</div>
				</div>
				{/block}
			</div>
		</div>
		<div id="content">
			<div class="wrap">
				{block "content"}{/block}
			</div>
		</div>
		{block "footer"}
		<div id="footer">
			<div class="wrap">
				<div class="partners">
					<h3>С подкрепата на:</h3>
					<ul class="assets">
						<li><a href="https://www.burgas.bg/" title="Община Бургас" target="_blank"><img src="{$base}resource/image/public/partner/burgas.png" alt="Община Бургас" /></a></li>
						{*
						<li><a href="http://www.komplex2000.com/" title="Комплекс 2000" target="_blank"><img src="{$base}resource/image/public/partner/komplex2000.jpg" alt="Комплекс 2000" /></a></li>
						<li><a href="https://www.facebook.com/BigBoyPizzaBulgaria/" title="Big Boy Pizza" target="_blank"><img src="{$base}resource/image/public/partner/bigboypizza.jpg" alt="Big Boy Pizza" /></a></li>
						<li><a href="https://www.facebook.com/papacraftbeer/" title="Papa Beer" target="_blank"><img src="{$base}resource/image/public/partner/papabeer.jpg" alt="Papa Beer" /></a></li>
						<li><a href="http://transwagon-bg.com/" title="Трансвагон АД" target="_blank"><img src="{$base}resource/image/public/partner/transwagon.png" alt="Трансвагон АД" /></a></li>
						<li><a href="http://www.technologica.com/" title="ТехноЛогика" target="_blank"><img src="{$base}resource/image/public/partner/technologica.png" alt="ТехноЛогика" /></a></li>
						<li><a href="http://www.vodokanalstroy.com/" title="Водоканалстрой" target="_blank"><img src="{$base}resource/image/public/partner/vodokanalstroj.png" alt="Водоканалстрой" /></a></li>
						<li><a href="http://www.sutherlandglobal.bg" title="Съдърланд България" target="_blank"><img src="{$base}resource/image/public/partner/sutherland.png" alt="Съдърланд България" /></a></li>
						<li><a href="https://www.facebook.com/codexacademy%20/" title="Code-X" target="_blank"><img src="{$base}resource/image/public/partner/codex.png" alt="Code-X" /></a></li>
						<li><a href="http://meduzata.com/" title="Медузата" target="_blank"><img src="{$base}resource/image/public/partner/meduzata.png" alt="Медузата" /></a></li>
						<li><a href="https://vijmag.bg/" title="Виж!" target="_blank"><img src="{$base}resource/image/public/partner/vij.png" alt="Виж!" /></a></li>
						<li><a href="https://hamalogika.com" title="Хамалогика" target="_blank"><img src="{$base}resource/image/public/partner/hamalogika.png" alt="Хамалогика" /></a></li>
						<li><a href="https://www.brita.bg/" title="Brita" target="_blank"><img src="{$base}resource/image/public/partner/brita.png" alt="Brita" /></a></li>
						*}
					</ul>
				</div>
				<div class="contacts">
					<div class="pure-g">
						<div class="pure-u-1 pure-u-sm-1-4">
							<a href="{$base}support" class="support">Подкрепи Burgas Game Jam 2019</a>
						</div>
						<div class="pure-u-1 pure-u-sm-1-4">
							<p><a href="mailto:gamejam@burgaslab.org"><i class="fa fa-envelope"></i>gamejam@burgaslab.org</a></p>
							<p>организатор: <a href="http://burgaslab.org">BurgasLab</a></p>
						</div>
						<div class="pure-u-1 pure-u-sm-1-4">
							<p><a href="https://www.facebook.com/events/2028494330723285/"><i class="fa fa-facebook"></i>събитието във фейсбук</a></p>
							<p><a href="https://www.facebook.com/BurgasGameJam"><i class="fa fa-facebook"></i>Burgas Game Jam</a></p>
							</div>
						<div class="pure-u-1 pure-u-sm-1-4">
							<p><a target="_blank" href="https://www.google.bg/maps/place/%D0%95%D0%BA%D1%81%D0%BF%D0%BE%D0%B7%D0%B8%D1%86%D0%B8%D0%BE%D0%BD%D0%B5%D0%BD+%D1%86%D0%B5%D0%BD%D1%82%D1%8A%D1%80+%D0%A4%D0%BB%D0%BE%D1%80%D0%B0+%D0%91%D1%83%D1%80%D0%B3%D0%B0%D1%81/@42.5043459,27.4825012,15z/data=!4m12!1m6!3m5!1s0x0:0xfe565c58d6cd774e!2z0JXQutGB0L_QvtC30LjRhtC40L7QvdC10L0g0YbQtdC90YLRitGAINCk0LvQvtGA0LAg0JHRg9GA0LPQsNGB!8m2!3d42.5043459!4d27.4825012!3m4!1s0x0:0xfe565c58d6cd774e!8m2!3d42.5043459!4d27.4825012"><i class="fa fa-map-marker"></i>Експозиционен център “Флора”</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		{/block}
	</div>
	{block "webcounter"}
	{literal}
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-58643489-1', 'auto');
		ga('send', 'pageview');
	</script>
	{/literal}
	{/block}
</body>
</html>
