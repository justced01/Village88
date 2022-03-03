
	<div class="wrapper">
		<h1>HTTP Analyzer</h1>
		<form action="websites/get_page" method="post">
			<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
			<label for="url">URL to fetch by Ajax</label>
			<input id="url" name="url" type="text" placeholder="Enter a url">
			<input type="submit" value="Fetch">
		</form>
		<div id="display"></div>
	</div>
</body>
</html>