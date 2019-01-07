<?php include("header.php"); ?>
<div class = "container" style="margin-top:20px;">
    <h1>Articles Form</h1>
 
<?php echo form_open_multipart("admin/userValidation"); ?>
    <?php echo form_hidden("user_id",$this->session->userdata('id')); ?>   
    <?php echo form_hidden("published_on",date('Y-m-d H:i:s')); ?> 
    <div class="row">
    <div class="col-lg-6">
    <div class="form-group">
        <label for="title">Add Article :</label>
        <?php echo form_input(["type"=>"text","class"=>"form-control","placeholder"=>"Add Your own Article","name"=>"article_title","value"=>set_value("article_title")]);?>
    </div>
    </div>
    <div class="col-lg-6" style = "margin-top:40px;">
    <?php echo form_error("article_title"); ?>
    </div>
    <div class="col-lg-6">
     <div class="form-group">
        <label for="body">Article Body :</label>
         <?php echo form_textarea(["type"=>"text","class"=>"form-control","placeholder"=>"Article's Body","name"=>"article_body","value"=>set_value("article_body")]); ?>
    </div>
        </div>
    <div class="col-lg-6" style = "margin-top:40px;">
    <?php echo form_error("article_body"); ?>
    </div>
        
        <div class="col-lg-6">
     <div class="form-group">
        <label for="body">Choose image :</label>
         <?php echo form_upload(["name"=>"userfile"]); ?>
    </div>
        </div>
    <div class="col-lg-6" style = "margin-top:40px;">
    <?php if(isset($upload_error)) {echo $upload_error  ;} ?>
    </div>
        
    <?php echo form_submit(["type"=>"submit","class"=>"btn btn-default ","value"=>"Submit"]);?>&nbsp
    <?php echo form_reset(["type"=>"reset","class"=>"btn btn-primary ","value"=>"Reset"]);?>
    </div>

</div>
<?php include("footer.php"); ?>
 