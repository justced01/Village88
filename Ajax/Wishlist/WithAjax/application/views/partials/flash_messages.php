    <div class="errors">
<?php if(isset($errors)){
        foreach($errors as $value){ ?>
        <p><?= $value ?></p>
<?php }} ?>
    </div>
    <div class="success">
<?php if(isset($success)){
        foreach($success as $value){ ?>
        <p><?= $value ?></p>
<?php }} ?>
    </div>