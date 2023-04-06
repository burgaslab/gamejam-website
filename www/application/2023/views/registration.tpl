{extends "base.tpl"}

{block "content"}
<div class="registration">
	{if $open}
		{if $success}
			<div class="success">
				<p>Вашата регистрация за Burgas Game Jam 2023 беше успешна!</p>
			</div>
		{else}
			<form method="post" action="#" class="pure-form pure-form-stacked validate">
				<h1>Регистрация за Burgas Game Jam 2023</h1>
				{if !$validator->is_valid()}
					{error_summary $validator}
				{/if}
				<div class="pure-g">
					<div class="pure-u-1 pure-u-sm-1-1 validate required {if $validator->has_error("name")}error{/if}">
						<input class="pure-input-1" type="text" placeholder="Име и фамилия" name="name" value="{$model.name}" />
					</div>
					<div class="pure-u-1 pure-u-sm-1-1 validate email {if $validator->has_error("email")}error{/if}">
						<input class="pure-input-1" type="text" placeholder="Електронна поща" name="email" value="{$model.email}" />
						<em>Ще бъде използван за връзка с вас!</em>
					</div>
					<div class="pure-u-1 pure-u-sm-1-1 validate required {if $validator->has_error("age")}error{/if}">
						<p class="label">Възраст /само за статистика/</p>
	
						<input class="pure-input-1" type="text" placeholder=Възраст name="age" value="{$model.age}" style="max-width: 100px;" />
					</div>
					<div class="pure-u-1 pure-u-sm-1-1 validate required {if $validator->has_error("occupation")}error{/if}">
						<p class="label">Заетост</p>
						{foreach $occupations as $i}
						<label><input type="radio" name="occupation" value="{$i}" {checked $model.occupation==$i}>{$i}</label>
						{/foreach}
					</div>
					<div class="pure-u-1 pure-u-sm-1-1 validate required {if $validator->has_error("occupation")}error{/if}">
						<p class="label">Размер тениска</p>
						<select name="shirt_size">
							<option></option>
							{foreach $shirt_sizes as $i}
							<option {selected $model.shirt_size==$i}>{$i}</option>
							{/foreach}
						</select>
					</div>
					<div class="pure-u-1">
						<input class="pure-input-1" type="text" placeholder="Умения" name="skills" value="{$model.skills}" />
						<em>Разделени със запетая</em>
					</div>
					
					<p class="pure-u-1">Необходимо е да имате навършени 18 години или да сте придружен от родител или настойник.</p>
					
					<div class="pure-u-1 validate required {if $validator->has_error("agree")}error{/if}">
						<label><input type="checkbox" name="agree" {checked $model.agree} />&nbsp;Наясно съм, че проектите се публикуват под <a href="{$base}rules#copyrights">Creative commons лиценз <i class="fa fa-exclamation-circle"></i></a></label>
					</div>
					<div class="pure-u-1">
						<button type="submit" class="pure-button pure-button-primary">Регистрирай ме!</button>
					</div>
				</div>
			</form>
		{/if}
	{else}
		<h1>Онлайн регистрацията приключи, заповядайте на място!</h1>
	{/if}
</div>
{/block}