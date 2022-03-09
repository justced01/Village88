
    <div class="text-sm text-red-500 font-semibold">
<?php 
    if($this->session->flashdata('errors')){
        foreach($this->session->flashdata('errors') as $value){ ?>
        <p><?= $value ?></p>
<?php }} ?>
    </div>
    <div class="text-sm text-green-500 font-semibold">
<?php 
    if($this->session->flashdata('success')){
        foreach($this->session->flashdata('success') as $value){ ?>
        <p><?= $value ?></p>
<?php }} ?>
    </div>