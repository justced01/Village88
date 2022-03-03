
	<div class="wrapper">
		<header>
			<h1 id="title"><?= $count === 5 ? 'All Assignments': $count . ' Assignment/s' ?></h1>
			<form action="<?= base_url() ?>assignments/filter" method="post" class="filter-form">
				<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>"/>
				<label><input type="checkbox" name="level" value="Easy"> Easy</label>
				<label><input type="checkbox" name="level" value="Intermediate"> Intermediate</label>
				<select name="track" id="track">
					<option value="">All</option>
					<option value="Introduction">Introduction</option>
					<option value="Web Fundamentals">Web Fundamentals</option>
					<option value="PHP">PHP</option>
				</select>
			</form>
		</header>
		<div id="assignments">
			<table>
				<tr>
					<th>Assignment</th>
					<th>Sequence num</th>
					<th>Level</th>
					<th>Track</th>
				</tr>
<?php foreach($assignments as $assignment){ ?>
				<tr>
					<td><?= $assignment['assignment'] ?></td>
					<td><?= $assignment['sequence_num'] ?></td>
					<td><?= $assignment['level'] ?></td>
					<td><?= $assignment['track'] ?></td>
				</tr>
<?php } ?>
			</table>
		</div>

		<form action="<?= base_url() ?>assignments/process/<?= $count ?>" method="post" class="show-form">
			<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>"/>
			<input type="submit" value="Show more">
		</form>
	</div>
</body>
</html>