<td>{$item->name}</td>
<td>{$item->email}</td>
<td>{$item->age}</td>
<td>{$item->occupation}</td>
<td>{$item->skills}</td>
<td>{$item->timestamp}</td>
<td>{$item->time_confirmed}</td>
<td>{$item->team_name} {if $item->game}({$item->game}){/if}</td>
<td class="actions">
	<button title="редакция" class="edit"><span>редакция</span></button>
	{*
	<button title="изтриване" class="del"><span>изтриване</span></button>
	*}
</td>