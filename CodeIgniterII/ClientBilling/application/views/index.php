
		<?= form_open('billings/date_range', $data['class']); ?>
			<input type="text" id="start_datepicker" name="start_date" size="10" placeholder="mm/dd/yyyy" autocomplete="off">
			<input type="text" id="end_datepicker" name="end_date" size="10" placeholder="mm/dd/yyyy" autocomplete="off">
			<input type="submit" value="Show">
		</form>
		<h2>List of total charges per month:</h2>
		<table>
			<tr>
				<th>Month</th>
				<th>Year</th>
				<th>Total Cost</th>
			</tr>
<?php foreach($data['result'] as $result){ ?>
			<tr>
				<td><?= $result['month'] ?></td>
				<td><?= $result['year'] ?></td>
				<td><?= $result['total_cost'] ?></td>
			</tr>
<?php } ?>
		</table>
		<div id="billingChart"></div>
	</div>
</body>
</html>