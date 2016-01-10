{extends "base.tpl"}

{block "content"}
	<div class="home text">
		{if $time > 0}
		<div id="countdown"><div data-time="{$time}"></div></div>
		{/if}
		<h4><span><em class="bubble bubble-1"></em><i>1</i>Ела и научи</span></h4>
		<h4><span><em class="bubble bubble-2"></em><i>2</i>Сформирай екип</span></h4>
		<h4><span><em class="bubble bubble-3"></em><i>3</i>Направи игра!</span></h4>
		<p>1 тема</p>
		<p>~ 45 часа</p>
		<p>~ 28 000 участника от 78 страни (2015)</p>
		<p class="registration"><a href="{$base}registration">Регистрирай се за участие още сега!</a></p>
		<br />
		<h4><span><em class="bubble bubble-1"></em><a href="{$base}what"><i class="fa fa-question"></i> Какво е Burgas Game Jam</a></span></h4>
		<p>
			Burgas Game Jam е 48 часов хакатон за правене на игри. <br />
			Случва се в рамките на 3 дни. <br />
			Част e от глобалната инициатива <a href="http://globalgamejam.org/" target="_blank">Global Game Jam.</a><br />
			<a href="http://globalgamejam.org" target="_blank"><img src="resource/image/public/ggj.png" alt="" /></a><br />
			Организатор: <br />
			<a href="http://burgaslab.org" target="_blank"><img src="resource/image/public/burgaslab.png" alt="" /></a>
		</p>
		<h4><span><em class="bubble bubble-2"></em><a href="{$base}rules"><i class="fa fa-exclamation"></i> Правила</a></span></h4>
		<p>
			На 23ти януари ела в Казиното в 13:30, за да се запознаеш с останалите game ентусиасти в Бургас, откриеш твоя екип и заедно направите игра за 48 часа! <br />
			Участието е безплатно и всички са добре дошли - програмисти, дизайнери, артисти, геймъри, game ентусиасти, любители и професионалисти. <br />
			Минимална възраст: 12+
		</p>
	</div>
{/block}