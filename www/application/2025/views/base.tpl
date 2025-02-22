<!DOCTYPE html>
<html data-root="{$base}">
<head>
	<title>{$html_title}</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta property="og:image" content="{$http_base}resource/image/public/header.png?v=1" />
{block "bundle"}
{webresources bundle="public_css"}
{webresources bundle="public_js"}
{webresources icon="public"}
{/block}
{literal}
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '373124866570193');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=373124866570193&ev=PageView&noscript=1"
/></noscript>
{/literal}
</head>
<body class="{block "body_class"}{/block}">
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
						<a href="{$base}"><img src="{$base}resource/image/public/header.png?v=1" class="pure-img" alt="Burgas Game Jam 2025" /></a>
						<p style="display: none">24 януари - 26 януари 2025<br/>в Регионална библиотека “Пейо Яворов”</p>
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
						<li><a href="http://burgaslab.org" title="BurgasLab" target="_blank"><img src="{$base}resource/image/public/partner/burgaslab.png" alt="BurgasLab" /></a></li>
						<li><a href="http://globalgamejam.org" title="Global Game Jam" target="_blank"><img src="{$base}resource/image/public/partner/ggj.png" alt="Global Game Jam" /></a></li>
						<li><a href="https://www.burgas.bg" title="Община Бургас" target="_blank"><img src="{$base}resource/image/public/partner/burgas.png" alt="Община Бургас" /></a></li>
						<li><a href="https://maps.app.goo.gl/KUjhpdzArR35cfsr8" title="Регионална библиотека “Пейо Яворов”" target="_blank"><img src="{$base}resource/image/public/partner/lib.png" alt="Регионална библиотека “Пейо Яворов”" /></a></li>
						<li><a href="https://www.sumup.com" title="SumUp" target="_blank"><img src="{$base}resource/image/public/partner/sumup.png" alt="SumUp" /></a></li>
						<li><a href="https://www.facebook.com/yavkafoodbar/?locale=bg_BG" title="ЯВ-КА food bar" target="_blank"><img src="{$base}resource/image/public/partner/yav-ka.png" alt="ЯВ-КА food bar" /></a></li>
						<li><a href="https://www.pizza-romance.com" title="Пицарии “Романс“" target="_blank"><img src="{$base}resource/image/public/partner/romans.png" alt="Пицарии “Романс“" /></a></li>
						<li><a href="http://stedicenter.com" title="Книжарница Стеди" target="_blank"><img src="{$base}resource/image/public/partner/stedi.png" alt="Книжарница Стеди" /></a></li>
						<li><a href="https://www.facebook.com/BoardGameClubAurora" title="Club Aurora" target="_blank"><img src="{$base}resource/image/public/partner/aurora.png" alt="Club Aurora" /></a></li>
						<li><a href="https://giftlab.bg/" title="Gift Lab" target="_blank"><img src="{$base}resource/image/public/partner/giftlab.png" alt="Gift Lab" /></a></li>
						<li><a href="https://ez-arcade-machine.com/" title="Retro Gaming EZ Arcade" target="_blank"><img src="{$base}resource/image/public/partner/logo-ez-arcade.jpg" alt="Retro Gaming EZ Arcade" /></a></li>
					</ul>
				</div>
				<div class="contacts">
					<div class="pure-g">
						<div class="pure-u-1 pure-u-sm-1-4">
							<a href="{$base}support" class="support">Подкрепи Burgas Game Jam 2025</a>
						</div>
						<div class="pure-u-1 pure-u-sm-1-4">
							<p><a href="mailto:gamejam@burgaslab.org"><i class="fa fa-envelope"></i>gamejam@burgaslab.org</a></p>
							<p>организатор: <a href="https://burgaslab.org">BurgasLab</a></p>
						</div>
						<div class="pure-u-1 pure-u-sm-1-4">
							<p><a href="#" target="_blank"><i class="fa fa-facebook"></i>събитието във фейсбук</a></p>
							<p><a href="https://www.facebook.com/BurgasGameJam" target="_blank"><i class="fa fa-facebook"></i>Burgas Game Jam</a></p>
							</div>
						<div class="pure-u-1 pure-u-sm-1-4">
							<p><a target="_blank" href="https://maps.app.goo.gl/KUjhpdzArR35cfsr8"><i class="fa fa-map-marker"></i>Регионална библиотека “Пейо Яворов”</a></p>
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
