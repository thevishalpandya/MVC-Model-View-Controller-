<?php include("header.php"); ?>
<div class = "container" style="margin-top:20px;">
    <h1>Registration Form</h1>
<?php echo form_open("login/sendEmail"); ?>
    
     <?php if($user = $this->session->flashdata("User")) : 
            
            $user_report = $this->session->flashdata("User_report");
            
            ?>
    
    <div class="row">
        <div class="col-lg-6">
            <div class="<?= $user_report; ?>">
                <?php echo $user; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    
    <div class="row">
    <div class="col-lg-6">
    <div class="form-group">
        <label for="Username">Username:</label>
        <?php echo form_input(["type"=>"text","class"=>"form-control","placeholder"=>"Enter Your Name","name"=>"username","value"=>set_value("username")]);?>
    </div>
    </div>
    <div class="col-lg-6" style = "margin-top:40px;">
    <?php echo form_error("username"); ?>
    </div>
        
    <div class="col-lg-6">
     <div class="form-group">
        <label for="pwd">Password :</label>
         <?php echo form_password(["type"=>"password","class"=>"form-control","placeholder"=>"Enter Your password","name"=>"password","value"=>set_value("password")]); ?>
    </div>
        </div>
    <div class="col-lg-6" style = "margin-top:40px;">
    <?php echo form_error("password"); ?>
    </div>
        
        <div class="col-lg-6">
     <div class="form-group">
        <label for="fn">First Name :</label>
         <?php echo form_input(["type"=>"text","class"=>"form-control","placeholder"=>"Enter Your First Name","name"=>"first_name","value"=>set_value("first_name")]); ?>
    </div>
        </div>
    <div class="col-lg-6" style = "margin-top:40px;">
    <?php echo form_error("first_name"); ?>
    </div>
        
         <div class="col-lg-6">
     <div class="form-group">
        <label for="ln">Last Name :</label>
         <?php echo form_input(["type"=>"text","class"=>"form-control","placeholder"=>"Enter Your Last Name","name"=>"last_name","value"=>set_value("last_name")]); ?>
    </div>
        </div>
    <div class="col-lg-6" style = "margin-top:40px;">
    <?php echo form_error("last_name"); ?>
    </div>
        
         <div class="col-lg-6">
     <div class="form-group">
        <label for="email">Email :</label>
         <?php echo form_input(["class"=>"form-control","placeholder"=>"Enter Your Email","name"=>"email","value"=>set_value("email")]); ?>
    </div>
        </div>
    <div class="col-lg-6" style = "margin-top:40px;">
    <?php echo form_error("email"); ?>
    </div>
        
    <?php echo form_submit(["type"=>"submit","class"=>"btn btn-default ","value"=>"Submit"]);?>&nbsp
    <?php echo form_reset(["type"=>"reset","class"=>"btn btn-primary ","value"=>"Reset"]);?>&nbsp
    </div>

</div>
<?php include("footer.php"); ?>
 