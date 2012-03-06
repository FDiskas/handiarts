<form action="{$base_url}gallery/upload" method="post" enctype="multipart/form-data">
	<input type="file" name="userfile[]" size="20"  onchange="count_files()"  multiple />
	<input type="submit" value="upload" /><span id="info"></span><div id="bag"><ul/></div><span id="totals"></span>
</form>