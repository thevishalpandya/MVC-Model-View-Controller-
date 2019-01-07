<!DOCTYPE html>
<html lang="en">

<head>
    <title>
       CodeIgniter Dynamic Dependent Box Selection Using Ajax      
    </title>  
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .box
 {
  width:100%;
  max-width: 650px;
  margin:0 auto;
 }
   </style> 
    </head>
    
    <body>
    <div class="container">
    <br />
    <br />
     <h3 style = "align:center;">CodeIgniter Dynamic Dependent Box Selection Using Ajax<h3>
    <br />
    <div class="form-group">
            
    <select name="country" id="country" class="form-control input-lg">
        <option value="">Select country</option> 
        <?php 
        foreach($country as $row){
        echo '<option value="'.$row->country_id.'">'.$row->country_name.'</option>';
        }
        ?>
    </select>
    </div>
         
    <div class="form-group">
    <select name="state" id="state" class="form-control input-lg">
        <option value="">Select State</option> 
    </select>
    </div>
         
         <div class="form-group">
    <select name="city" id="city" class="form-control input-lg">
        <option value="">Select City</option> 
    </select>
    </div>
         
    </div>
    </body>
    
    
</html>  
       <script>
           
        $(document).ready(function(){
            $("#country").change(function(){
                var country_id = $("#country").val();
                if(country_id != ""){
                $.ajax({
                    url:"<?php echo base_url("dynamic_dependent/fetch_state"); ?>",
                     method:"POST",
                    data:{country_id:country_id},
                    success:function(data){
                        
                        $("#state").html(data);
                        $("#city").html("<option value = ''>Select city</option>");
                    }
                  }); 
                }else{
                    $("#state").html("<option value = ''>select state</option>");
                    $("#city").html("<option value = ''>select state</option>");
                }
                
            });
            $("#state").change(function(){
                var state_id = $("#state").val();
                if(state_id != ""){
                    $.ajax({
                        url:"<?php echo base_url("dynamic_dependent/fetch_city")?>",                  
                        method:"POST",
                        data:{state_id:state_id},
                        success:function(data){
                           $("#city").html(data);
                        }
                        
                    });
                }else{
                    $("#city").html("<option value = ''>select state</option>");
                }
            });
            
        });
           
           
        </script>