<?=form_open( base_url() . 'main/login' )?>
<fieldset>
	<legent>Login form</legent>
	<ul>
		<li>
			<?=form_error('userEmail')?>
			<label>
				Email:
				<?=form_input('userEmail', set_value('userEmail'))?>
			</label>
		</li>
		<li>
			<?=form_error('userPassword')?>
			<label>
				Password:
				<?=form_password('userPassword')?>
			</label>
		</li>
		<li>
			<?=form_submit('', 'Login' )?>
		</li>
	</ul>
</fieldset>
<?=form_close()?>