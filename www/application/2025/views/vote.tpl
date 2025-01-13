{extends "base.tpl"}

{block "content"}
<div class="vote">
	{if $open}
		{if $success}
			<div class="success">
				<p>Вашият вот беше отчетен!</p>
			</div>
		{else}
			<form method="post" action="" class="pure-form pure-form-stacked validate">
				<h1>Гласувайте за най-добра игра на Burgas Game Jam 2025</h1>
				{if $is_participant}
				<h3>Важно: Не можете да гласувате за собствения си отбор, затова той не присъства в списъците!</h3>
				{/if}
				<div class="pure-g">
					{foreach $categories as $c}
						<div class="pure-u-1 validate required {if $validator->has_error($c->name)}error{/if}">
							<p>{$c->desc}</p>
							<select name="category[{$c->id}]">
								<option value="">изберете отбор и игра...</option>
								{foreach $teams as $t}
									<option value="{$t->id}" {selected $model["category"][$c->id]==$t->id}>"{$t->game}" / отбор "{$t->name}"</option>
								{/foreach}
							</select>
						</div>
					{/foreach}
					{if !$is_participant}
					<div class="pure-u-1 validate required {if $validator->has_error("code")}error{/if}">
						<p>Шест цифрен код за гласуване * </p>
						<input class="pure-input-1" type="text" placeholder="Код за гласуване" name="code" value="{$model.code}" />
						<p>* <em>Ако не знаете какво е това, питайте някой от екипа на Burgas Game Jam.</em></p>
					</div>
					{/if}
					<div class="pure-u-1"><p>{if $validator->has_error("code")}<span class="error">{$validator->get_error("code")}</span>{/if}</p></div>
					<div class="pure-u-1">
						<p>Моля, проверете че вашият избор е правилен!</p>
						<button type="submit" class="pure-button pure-button-primary">Гласувам!</button>
					</div>
				</div>
			</form>
		{/if}
	{else}
		<div class="success">
			<p>Гласуването приключи! :)</p>
		</div>
	{/if}
</div>
{/block}
