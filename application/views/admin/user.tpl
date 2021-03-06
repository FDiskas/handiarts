{extends file='admin/layout/layout.tpl'}
{block name='title'}My Page Title{/block}
{block name='body'}
	{extends file='admin/layout/block.tpl'}

	{block name='content'}
	<table border="1">
		<thead>
		<tr>
			<th>{t}Id{/t}</th>
			<th>{t}Email{/t}</th>
			<th>{t}Status{/t}</th>
			<th>{t}Type{/t}</th>
		</tr>
		</thead>
		{if isset($sPages)}
		<tfoot>
		<tr>
			<td colspan="4">
				<div class="bulk-actions align-left">
					<form action="">
						<input class="text-input small-input" type="text" id="small-input" name="search">
						<input type="submit" class="button" value="Search" />
					</form>
				</div>
				{$sPages}
				<div class="clear"></div>
			</td>
		</tr>
		</tfoot>
		{/if}
		<tbody>
		{foreach from=$aUsers item='aUser' name='userTable'}
		<tr class="{if $smarty.foreach.userTable.index is even}alt-row{/if}">
			<td>{$aUser->userId}</td>
			<td>{$aUser->userEmail}</td>
			<td>{$aUser->userStatus}</td>
			<td>{$aUser->userType}</td>
		</tr>
		{/foreach}
		</tbody>
	</table>

	{/block}
{/block}