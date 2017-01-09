<td>
	<input type="text" name="name" value="{$item->name|default}" />
</td>
<td>
	<input type="text" name="email" value="{$item->email|default}" />
</td>
<td>
	<input type="text" name="age" value="{$item->age|default}" />
</td>
<td>
	<select name="occupation">
		{foreach $occupations as $i}
			<option value="{$i}" {selected $item->occupation|default==$i}>{$i}</option>
		{/foreach}
	</select>
</td>
<td>
	<textarea name="skills">{$item->skills|default}</textarea>
</td>
<td>{$item->timestamp|default}</td>
<td>{$item->time_confirmed|default}</td>
<td>
	<select name="team_id">
		<option value="">-</option>
		{foreach $teams as $i}
			<option value="{$i->id}" {selected $item->team_id|default==$i->id}>{$i->name} ({$i->game})</option>
		{/foreach}
	</select>
</td>
<td class="actions">
	<button title="запис" class="save"><span>запис</span></button>
	<button title="отказ" class="cancel"><span>отказ</span></button>
</td>