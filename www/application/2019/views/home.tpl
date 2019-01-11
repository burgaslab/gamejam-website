{extends "base.tpl"}

{block "content"}
	{if $live_stream}
		<div class="video">
			{$live_stream nofilter}
		</div>
	{/if}
	{if $embed}
		<div class="video">
			{$embed nofilter}
		</div>
	{/if}
	{if $time > 0}
	<div id="countdown"><div data-time="{$time}"></div></div>
	{/if}
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTgu5QB8U0SaLoaGvtXE3m5YA99XGqMkk" type="text/javascript"></script>
	<div id="googlemap" data-objects="{$map_model|json_encode}" data-root="{$base}"></div>
	<div class="home text">
		{$text nofilter}
	</div>
{/block}
