<?php include("header.php"); ?>
<div class = "container" style="margin-top:20px;">
    <h1>Admin Form</h1>
    
    <?php if($error = $this->session->flashdata("Login_failed")) : ?>
    
    <div class="row">
        <div class="col-lg-6">
            <div class="alert alert-danger">
                <?php echo $error; ?>
            </div>
        </div>
    </div>
    
    <?php endif; ?>
    
<?php echo form_open("login"); ?>
    <div class="row">
    <div class="col-lg-6">
    <div class="form-group">
        <label for="Username">Username:</label>
        <?php echo form_input(["type"=>"text","class"=>"form-control","placeholder"=>"Enter Your Name","name"=>"uname","value"=>set_value("uname")]);?>
    </div>
    </div>
    <div class="col-lg-6" style = "margin-top:40px;">
    <?php echo form_error("uname"); ?>
    </div>
    <div class="col-lg-6">
     <div class="form-group">
        <label for="pwd">Password :</label>
         <?php echo form_password(["type"=>"password","class"=>"form-control","placeholder"=>"Enter Your password","name"=>"pass","value"=>set_value("pass")]); ?>
    </div>
        </div>
    <div class="col-lg-6" style = "margin-top:40px;">
    <?php echo form_error("pass"); ?>
    </div>
    <?php echo form_submit(["type"=>"submit","class"=>"btn btn-default ","value"=>"Submit"]);?>&nbsp
    <?php echo form_reset(["type"=>"reset","class"=>"btn btn-primary ","value"=>"Reset"]);?>&nbsp
        <?php echo anchor("login/register","Sign Up?","class = 'link-class'");?>
    </div>

</div>
<?php include("footer.php"); ?>
 