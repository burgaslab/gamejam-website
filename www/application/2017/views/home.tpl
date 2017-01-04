{extends "base.tpl"}

{block "content"}
	{if $time > 0}
	<div id="countdown"><div data-time="{$time}"></div></div>
	{/if}
	{*
	<iframe src="https://docs.google.com/forms/d/1USrad8qjh5B9ynBC9rKvwV7rNrL8gUqrdTRuQs8DtF8/viewform?embedded=true" width="100%" height="3000px" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
	*}
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjVP8Yr2qihfS8ymTPtq_qUJUsVUAOgrU " type="text/javascript"></script>
	<div id="googlemap" data-objects="{$map_model|json_encode}" data-root="{$base}"></div>
	<div class="home text">
		<h4><span><em class="bubble bubble-1"></em><i>1</i>Ела и научи</span></h4>
		<h4><span><em class="bubble bubble-2"></em><i>2</i>Сформирай екип</span></h4>
		<h4><span><em class="bubble bubble-3"></em><i>3</i>Направи игра!</span></h4>
		<p>1 тема</p>
		<p>~ 45 часа</p>
		<p>над 630 локации от 93 страни (2016)</p>
		<p class="registration"><a href="{$base}registration">Регистрирай се за участие още сега!</a></p>
		<br />
		<h4><span><em class="bubble bubble-1"></em><a href="{$base}what"><i class="fa fa-question"></i> Какво е Burgas Game Jam</a></span></h4>
		<p>
			Burgas Game Jam е 48 часов хакатон за правене на игри. <br />
			Случва се в рамките на 3 дни. <br />
			Част e от глобалната инициатива <a href="http://globalgamejam.org/" target="_blank">Global Game Jam.</a><br />
			<a href="http://globalgamejam.org" target="_blank"><img src="resource/image/public/partner/ggj.png" alt="" /></a><br />
			Организатор: <br />
			<a href="http://burgaslab.org" target="_blank"><img src="resource/image/public/burgaslab.png" alt="" /></a>
		</p>
		<h4><span><em class="bubble bubble-2"></em><a href="{$base}rules"><i class="fa fa-exclamation"></i> Правила</a></span></h4>
		<p>
			На 20-ти януари ела във Флората в 14:00, за да се запознаеш с останалите game ентусиасти в Бургас, откриеш твоя екип и заедно направите игра за 48 часа! <br />
			Участието е безплатно и всички са добре дошли - програмисти, дизайнери, артисти, геймъри, game ентусиасти, любители и професионалисти. <br />
			Минимална възраст: 18+
		</p>
	</div>
{/block}