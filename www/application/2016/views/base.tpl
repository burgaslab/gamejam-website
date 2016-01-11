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
							{assign var="children" value=((isset($i.sub)) ? $i.sub : array())}
							<li class="{$i.css|default} {if $children}dropdown{/if}"><a href="{$base}{$i.url}">{$i.title}{if $children}<i class="fa fa-caret-down"></i>{/if}</a>
								{if $children}
								<ul>
									{foreach $children as $j}
									<li><a href="{$base}{$i.url}{$j.url}">{$j.title}</a></li>
									{/foreach}
								</ul>
								{/if}
							</li>
						{/foreach}
						{/strip}
					</ul>
				</nav>
				<div class="logo">
					<div class="logo-wrap">
						<a href="{$base}"><img src="{$base}resource/image/public/logo.png" class="pure-img" alt="" /></a>
						<p>29-31 януари 2016<br/>в Културен център “Морско Казино”</p>
					</div>
				</div>
			</div>
		</div>
		<div id="content">
			<div class="wrap">
				{block "content"}{/block}
			</div>
		</div>
		<div id="footer">
			<div class="wrap">
				<div class="partners">
					<h3>С подкрепата на:</h3>
					<ul class="assets">
						<li><a href="http://globalgamejam.org/" title="Global Game Jam" target="_blank"><img src="{$base}resource/image/public/partner/ggj.png" alt="" /></a></li>
						<li><a href="http://burgas.bg" title="Община Бургас" target="_blank"><img src="{$base}resource/image/public/partner/burgasmunic.png" alt="" /></a></li>
						<li><a href="http://vijburgas.bg" title="Виж! Бургас" target="_blank"><img src="{$base}resource/image/public/partner/vijburgas.png" alt="" /></a></li>
						<li><a href="http://hamalogika.com" title="Хамалогика" target="_blank"><img src="{$base}resource/image/public/partner/hamalogika.png" alt="" /></a></li>
					</ul>
				</div>
				<div class="contacts">
					<div class="pure-g">
						<div class="pure-u-1 pure-u-sm-1-4">
							<a href="{$base}support" class="support">Подкрепи Burgas Game Jam 2016</a>
						</div>
						<div class="pure-u-1 pure-u-sm-1-4">
							<p><a href="mailto:gamejam@burgaslab.org">gamejam@burgaslab.org</a></p>
							<p>организатор: <a href="http://burgaslab.org">BurgasLab</a></p>
						</div>
						<div class="pure-u-1 pure-u-sm-1-4">
							<p><a href="#"><i class="fa fa-facebook"></i>събитието във фейсбук</a></p>
							<p><a href="https://www.google.bg/maps/place/Sea+Casino/@42.494256,27.4819305,17.5z/data=!4m2!3m1!1s0x0000000000000000:0x852570772343eadc?hl=en" data-iframe="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2080.218232373273!2d27.48193048992954!3d42.494256012388426!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x852570772343eadc!2sSea+Casino!5e0!3m2!1sen!2sbg!4v1452447228232" class="swipebox-iframe">Място: "Морско Казино" Бургас</a></p>
						</div>
						<div class="pure-u-1 pure-u-sm-1-4">
							<p><a href="{$base}2015">Burgas Game Jam 2015</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
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
</body>
</html>