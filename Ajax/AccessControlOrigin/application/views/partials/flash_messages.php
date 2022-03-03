    <div class="errors">
<?php 
    if($this->session->flashdata('errors')){
        foreach($this->session->flashdata('errors') as $value){ ?>
        <p><?= $value ?></p>
<?php }} ?>
    </div>
    <div class="success">
<?php 
    if($this->session->flashdata('success')){
        foreach($this->session->flashdata('success') as $value){ ?>
        <p><?= $value ?></p>
<?php }} ?>
    </div>