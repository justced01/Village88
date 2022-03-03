
<div id="assignments">
    <p id="count"><?= $count ?></p>
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