	    
    <div class="wrapper">
		<aside>
			<h2>Search User</h2>
			<div class="errors">
<?php if($this->session->flashdata('errors')){
        foreach($this->session->flashdata('errors') as $value){ ?>
            <p><?= $value ?></p>
<?php }} ?>
			</div>
			<div class="success">
<?php if($this->session->flashdata('success')){ ?>
				<p><?= $this->session->flashdata('success') ?></p>
<?php } ?>
			</div>
			<form action="<?= base_url('sports/search') ?>" method="post">
				<input type="text" name="name">
				<div class="checkbox-group">
					<input type="checkbox" name="sex" class="sex" value="M">
					<label>Male</label>
				</div>
				<div class="checkbox-group">
					<input type="checkbox" name="sex" class="sex" value="F">
					<label>Female</label>
				</div>
				<label>Sport</label>
<?php if(isset($index['sports'])){ 
		foreach($index['sports'] as $sport){ ?>
				<div class="checkbox-group">
					<input type="checkbox" name="sport" class="sport" value="<?= $sport['id']?>">
					<label><?= $sport['title'] ?></label>
				</div>
<?php }} ?>
				<input type="submit" value="Search">
			</form>
		</aside>
		<section>
<?php if(isset($index['players'])){
		foreach($index['players'] as $player){ ?>
			<div class="player-cards">
				<img src="<?= base_url('assets/img/' . $player['img_filename']); ?>" alt="<?= $player['fullname']; ?> Picture">
				<p><?= $player['fullname']; ?></p>
				<p><?= $player['title']; ?></p>
			</div>
<?php }} ?>
<?php if(isset($search)){ 
	foreach($search as $player){ ?>
			<div class="player-cards">
				<img src="<?= base_url('assets/img/' . $player['img_filename']); ?>" alt="<?= $player['fullname']; ?> Picture">
				<p><?= $player['fullname']; ?></p>
				<p><?= $player['title']; ?></p>
			</div>
<?php }} ?>
		</section>
	</div>
</body>
</html>