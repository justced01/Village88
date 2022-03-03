    
    <div class="wrapper">
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