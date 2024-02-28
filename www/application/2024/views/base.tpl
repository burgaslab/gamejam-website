<!DOCTYPE html>
<html data-root="{$base}">
<head>
	<title>{$html_title}</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta property="og:image" content="{$http_base}resource/image/public/header.png" />
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
			<img src="{$base}resource/image/public/header.png?v=1" alt="" />
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
						<a href="{$base}"><img src="{$base}resource/image/public/header.png?v=1" class="pure-img" alt="Burgas Game Jam 2024" /></a>
						<p style="display: none">26 януари - 28 януари 2024<br/>в Регионална библиотека “Пейо Яворов”</p>
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

						<li><a href="https://pliant.io/" title="Pliant" target="_blank"><img src="{$base}resource/image/public/partner/pliant.png" alt="Pliant" /></a></li>
						<li><a href="https://www.burgas.bg/" title="Община Бургас" target="_blank"><img src="{$base}resource/image/public/partner/burgas.png" alt="Община Бургас" /></a></li>
						<li><a href="https://mal-burgas.com/bg/biblioteka" title="Регионална Библиотека 'Пейо К. Яворов'" target="_blank"><img src="{$base}resource/image/public/partner/biblioteka.jpg" alt="Регионална Библиотека 'Пейо К. Яворов'" /></a></li>
						<li><a href="https://primorsko.bg/" title="Община Приморско" target="_blank"><img src="{$base}resource/image/public/partner/primorsko.png" alt="Община Приморско" /></a></li>
						<li><a href="https://ruoburgas.bg/" title="РУО - Бургас" target="_blank"><img src="{$base}resource/image/public/partner/ruo-burgas.webp" alt="РУО - Бургас" /></a></li>
						<li><a href="https://souprimorsko.net/" title="СУ Никола Вапцаров - Приморско" target="_blank"><img src="{$base}resource/image/public/partner/primorsko-school.png" alt="СУ Никола Вапцаров - Приморско" /></a></li>

						<li><a href="https://www.facebook.com/BoardGameClubAurora/" title="Board Game Club Aurora" target="_blank"><img src="{$base}resource/image/public/partner/aurora.jpg" alt="Board Game Club Aurora" /></a></li>
						<li><a href="https://giftlab.bg/" title="Gift Lab" target="_blank"><img src="{$base}resource/image/public/partner/giftlab.png" alt="Gift Lab" /></a></li>
						<li><a href="https://xiro.bg/" title="Xiro" target="_blank"><img src="{$base}resource/image/public/partner/xiro.png" alt="Xiro" /></a></li>
						<li><a href="https://robopartans.com/" title="Robopartans" target="_blank"><img src="{$base}resource/image/public/partner/robopartans.jpg" alt="Robopartans" /></a></li>
						
						<li><a href="https://comnet.bg/" title="Comnet" target="_blank"><img src="{$base}resource/image/public/partner/comnet.jpg" alt="Comnet" /></a></li>
						<li><a href="https://www.facebook.com/p/Reflex-Studio-100029707011872" title="Reflex Studio Burgas" target="_blank"><img src="{$base}resource/image/public/partner/reflexstudioburgas.png" alt="Reflex Studio Burgas" /></a></li>
						<li><a href="http://musicroomsburgas.eu/" title="Music Rooms Burgas" target="_blank"><img src="{$base}resource/image/public/partner/musicroombsburgas.png" alt="Music Rooms Burgas" /></a></li>
						<li><a href="https://bnr.bg/burgas" title="БНР Бургас" target="_blank"><img src="{$base}resource/image/public/partner/bnr-burgas.png" alt="БНР Бургас" /></a></li>
						<li><a href="https://www.facebook.com/yavkafoodbar/?locale=bg_BG" title="ЯВ-КА" target="_blank"><img src="{$base}resource/image/public/partner/yavka.png" alt="ЯВ-КА" /></a></li>
						<li><a href="https://www.facebook.com/p/%D0%A5%D0%BB%D0%B5%D0%91%D0%90%D0%A0%D0%BD%D0%B0-100063576221095/?locale=bg_BG" title="ХлеБАРна" target="_blank"><img src="{$base}resource/image/public/partner/hlebarna.jpg" alt="ХлеБАРна" /></a></li>
						<li><a href="https://www.pizza-romance.com/" title="Pizza Romance" target="_blank"><img src="{$base}resource/image/public/partner/pizza-romance.webp" alt="Pizza Romance" /></a></li>

						<li><a href="http://stedicenter.com/" title="Книжарница Стеди" target="_blank"><img src="{$base}resource/image/public/partner/stedi.jpg" alt="Книжарница Стеди" /></a></li>
						<li><a href="https://www.bryzosport.com/" title="Бризос Спорт" target="_blank"><img src="{$base}resource/image/public/partner/bryzos.jpg" alt="Бризос Спорт" /></a></li>
						<li><a href="https://ez-arcade-machine.com/" title="Retro Gaming EZ Arcade" target="_blank"><img src="{$base}resource/image/public/partner/ezarcade.jpg" alt="Retro Gaming EZ Arcade" /></a></li>
					</ul>
				</div>
				<div class="contacts">
					<div class="pure-g">
						<div class="pure-u-1 pure-u-sm-1-4">
							<a href="{$base}support" class="support">Подкрепи Burgas Game Jam 2024</a>
						</div>
						<div class="pure-u-1 pure-u-sm-1-4">
							<p><a href="mailto:gamejam@burgaslab.org"><i class="fa fa-envelope"></i>gamejam@burgaslab.org</a></p>
							<p>организатор: <a href="https://burgaslab.org">BurgasLab</a></p>
						</div>
						<div class="pure-u-1 pure-u-sm-1-4">
							<p><a href="https://www.facebook.com/events/1557310468415614" target="_blank"><i class="fa fa-facebook"></i>събитието във фейсбук</a></p>
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
