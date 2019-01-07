<?php include("header2.php"); ?>

<script>
    
    $(document).ready(function(){
       $("#myInput").on("keyup",function(){
          var value = $(this).val().toLowerCase();
          console.log(value);
           
           $("#myTable tr").filter(function(){
               $(this).toggle($(this).val().toLowerCase().indexOf(value) > -1);
           });
       });
    });
    
    </script>


<div class="container">
    <div class="row">
    <div class="col-lg-2">
    <a class = "btn btn-primary" style = "margin-top:10px;" href="<?php echo base_url(); ?>export">View feedback..!!</a>
    </div>
    <div class="col-lg-2">
    <a class = "btn btn-danger" style = "margin-top:10px;" href="<?php echo base_url(); ?>dynamic_dependent">New Demo</a>
    </div>
        
    <a class = "btn btn-danger" style = "margin-top:10px;" href="<?php echo base_url(); ?>login">Login</a>
    
    </div>
</div>
        <div class="row">
        <div class="container" style="margin-top:20px;">
            <h3>All Articles</h3>
            </div>
        </div>
        <div class="container" style="margin-top:20px;">
            
         <div class="table">
             <table>
                 <thead>
                     <tr><th>Serial No.</th>
                         <th>ARTICLE IMAGE</th>
                         <th>ARTICLE TITLE</th>
                         <th>Published on</th>
                     </tr>
                 </thead>
                 <tbody  id="myTable">

                     <?php if(count($articles)) : ?>
                     <?php $count = $this->uri->segment(3); ?>
                     <?php foreach($articles as $art) : ?>

                     <tr>
                         <td><?= ++$count; ?></td>
                         <?php if(!is_null($art->img_path)) { ?>
                         <td><img src="<?= $art->img_path?>" alt="" width="280" height="200"></td>
                         <?php } ?>
                          <td><?= anchor("admin/{$art->id}",$art->article_title); ?></td>
                         <td><?= date('d M y H:i:s',strtotime($art->published_on)); ?></td>
                     </tr>
                     <?php endforeach; ?>
                     <?php else :?>
                     <tr>
                         <td colspan = "3">No data available..!!</td>
                     </tr>
                     <?php endif; ?>
                     
                 </tbody>
                 
             </table>
              <?php echo $this->pagination->create_links(); ?>
            </div>
        </div>

<?php include("footer.php"); ?>
 