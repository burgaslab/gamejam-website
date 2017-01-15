<!DOCTYPE html>
<html>
<head>
	<title>{$html_title}</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta property="og:image" content="{$http_base}resource/image/public/facebook.jpg" />
{webresources bundle="public_css"}
{webresources bundle="public_js"}
{webresources icon="public"}
</head>
<body>
	<div id="page-wrap">
		<div id="side-nav">
			<img src="{$base}resource/image/public/logo.png" alt="" />
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
						<a href="{$base}"><img src="{$base}resource/image/public/logo.png" class="pure-img" alt="" /></a>
						<p>20-21-22 януари 2017<br/>в Експозиционен център “Флора”</p>
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
						<li><a href="http://globalgamejam.org" title="Global Game Jam" target="_blank"><img src="{$base}resource/image/public/partner/ggj.png" alt="Global Game Jam" /></a></li>
						<li><a href="http://burgas.bg" title="Община Бургас" target="_blank"><img src="{$base}resource/image/public/partner/burgasmunic.png" alt="Община Бургас" /></a></li>
						<li><a href="http://creatizmo.com" title="Creatizmo" target="_blank"><img src="{$base}resource/image/public/partner/creatizmo.png" alt="Creatizmo" /></a></li>
						<li><a href="http://littlegg.com" title="Littlegg" target="_blank"><img style="background-color: #EA9B08" src="{$base}resource/image/public/partner/littlegg.png" alt="Littlegg" /></a></li>
						<li><a href="http://tobiigaming.com/ggj" title="Tobii" target="_blank"><img src="{$base}resource/image/public/partner/tobii.png" alt="Tobii" /></a></li>
						<li><a href="http://technologica.com" title="ТехноЛогика" target="_blank"><img src="{$base}resource/image/public/partner/technologica.png" alt="Technologica" /></a></li>
						<li><a href="http://vrita.net" title="Врита" target="_blank"><img src="{$base}resource/image/public/partner/vrita.png" alt="Врита" /></a></li>
						<li><a href="https://www.facebook.com/3DFreshBar/" title="3D Fresh" target="_blank"><img src="{$base}resource/image/public/partner/3Dfresh.png" alt="3D Fresh" /></a></li>
					</ul>
				</div>

				<div class="partners">
					<h3>Награди от:</h3>
					<ul class="assets">
						<li><a href="http://europe.casualconnect.org/" title="Casual Connect" target="_blank"><img src="{$base}resource/image/public/partner/casual_connect.png" alt="Casual Connect" /></a></li>
						<li><a href="https://softuni.bg/" title="SoftUni" target="_blank"><img src="{$base}resource/image/public/partner/softuni.png" alt="СофтУни" /></a></li>
						<li><a href="http://hamalogika.com" title="Хамалогика" target="_blank"><img src="{$base}resource/image/public/partner/hamalogika.png" alt="Хамалогика" /></a></li>
						<li><a href="http://www.dmsysbg.com" title="DMS Компютри и офис техника" target="_blank"><img style="background-color: #000" src="{$base}resource/image/public/partner/dmsysbg.png" alt="DMS" /></a></li>
						<li><a href="http://www.musala.com" title="Musala Soft" target="_blank"><img src="{$base}resource/image/public/partner/musala.png" alt="Musala Soft" /></a></li>
						<li><a href="http://www.komplex2000.com" title="Комплекс 2000" target="_blank"><img src="{$base}resource/image/public/partner/komplex2000.jpg" alt="Комплекс 2000" /></a></li>
						
					</ul>
				</div>
				<div class="contacts">
					<div class="pure-g">
						<div class="pure-u-1 pure-u-sm-1-4">
							<a href="{$base}support" class="support">Подкрепи Burgas Game Jam 2017</a>
						</div>
						<div class="pure-u-1 pure-u-sm-1-4">
							<p><a href="mailto:gamejam@burgaslab.org"><i class="fa fa-envelope"></i>gamejam@burgaslab.org</a></p>
							<p>организатор: <a href="http://burgaslab.org">BurgasLab</a></p>
						</div>
						<div class="pure-u-1 pure-u-sm-1-4">
							<p><a href="https://www.facebook.com/events/705300342977458/"><i class="fa fa-facebook"></i>събитието във фейсбук</a></p>
							<p><a href="https://www.facebook.com/BurgasGameJam"><i class="fa fa-facebook"></i>Burgas Game Jam</a></p>
							</div>
						<div class="pure-u-1 pure-u-sm-1-4">
							<p><a href="https://www.google.bg/maps/place/%D0%95%D0%BA%D1%81%D0%BF%D0%BE%D0%B7%D0%B8%D1%86%D0%B8%D0%BE%D0%BD%D0%B5%D0%BD+%D1%86%D0%B5%D0%BD%D1%82%D1%8A%D1%80+%D0%A4%D0%BB%D0%BE%D1%80%D0%B0+%D0%91%D1%83%D1%80%D0%B3%D0%B0%D1%81/@42.4942556,27.4753644,15z/data=!4m8!1m2!2m1!1z0YTQu9C-0YDQsA!3m4!1s0x40a694ed387e6e4d:0xfe565c58d6cd774e!8m2!3d42.5043459!4d27.4825012" data-iframe="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2080.218232373273!2d27.48193048992954!3d42.494256012388426!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x852570772343eadc!2sSea+Casino!5e0!3m2!1sen!2sbg!4v1452447228232" class="swipebox-iframe"><i class="fa fa-map-marker"></i>Експозиционен център “Флора”</a></p>
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
