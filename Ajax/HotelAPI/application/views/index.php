
	<div class="wrapper">
		<form action="hotels/search" method="post">
			<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
			<label for="from">Start date: </label>
			<input type="text" id="from" name="start_date">
			<label for="to">End date: </label>
			<input type="text" id="to" name="end_date">
			<input type="submit" value="List Hotel">
		</form>
		<h1>Search results for <span id="start"></span> to <span id="end"></span></h1>
		<div id="results">

		</div>
	</div>
</body>
</html>