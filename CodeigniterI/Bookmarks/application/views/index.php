<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bookmark</title>
	<link rel="stylesheet" href="<?= base_url('./assets/css/style.css') ?> ">
</head>
<body>
	<div class="wrapper">
		<h1>Add a Bookmark</h1>
<?php if($this->session->userdata('errors')){
		$errors = $this->session->userdata('errors');
		foreach ($errors as $error){
?>
		<p class="error"><?= $error ?></p>
<?php }} $this->session->unset_userdata('errors'); ?>
		<form action="process" method="post" class="add-form">
			<div class="input-group">
				<label for="name">Name: </label>
				<input type="text" name="name">
			</div>
			<div class="input-group">
				<label for="url">URL: </label>
				<input type="text" name="url">
			</div>
			<div class="input-group">
				<label for="folder">Folder: </label>
				<select name="folder">
					<option value="Favorites">Favorites</option>
					<option value="Important">important</option>
					<option value="Other">Others</option>
				</select>
			</div>
			<input type="submit" name="submit" value="Add">
		</form>
		<h2>Bookmarks</h2>
		<table>
			<tr class="thead">
				<th>Folder</th>
				<th>Name</th>
				<th>URL</th>
				<th>Action</th>
			</tr>
<?php 
	if(isset($books)){
		foreach ($books->result() as $book){
?>
			<tr>
				<td><?= $book->folder ?></td>
				<td><?= $book->name ?></td>
				<td><a href="<?= $book->url ?>" target="_blank"><?= $book->url ?></a></td>
				<td><a href="destroy/<?= $book->id ?>">Delete</a></td>
			</tr>		
<?php }} ?>
		</table>
	</div>
</body>
</html>