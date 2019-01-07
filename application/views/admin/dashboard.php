<?php include("header.php"); ?>
<html>
    <body>
        <div class="row">
        <div class="container" style="margin-top:20px;">
        <a href = "userValidation" class="btn btn-lg btn-primary">Add Articles</a>
            </div>
        </div>
        <div class="container" style="margin-top:20px;">
            
             <?php if($msg = $this->session->flashdata("msg")) : 
            
            $msg_report = $this->session->flashdata("msg_report");
            
            ?>
    
    <div class="row">
        <div class="col-lg-6">
            <div class="<?= $msg_report; ?>">
                <?php echo $msg; ?>
            </div>
        </div>
    </div>
    
    <?php endif; ?>
            
         <div class="table">
             <table>
                 <thead>
                     <tr><th>Serial No.</th>
                         <th>ARTICLE_TITLE</th>
                         <th>ARTICLE_BODY</th>
                         <th>For Edit</th>
                         <th>For Delete</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php if(count($articles)) : ?>
                     <?php $count = $this->uri->segment(3); ?>
                     <?php foreach($articles as $art) : ?>
                     <tr>
                         <td><?= ++$count; ?></td>
                         <td><?= $art->article_title; ?></td>
                          <td><?= $art->article_body; ?></td>
                         <td><?= anchor("admin/edituser/{$art->id}","Edit",['class' => 'btn btn-primary']); ?></td>
                         
                         <td>
                             <?= 
             form_open("admin/deluser"),
             form_hidden("id",$art->id),
            form_submit(["name"=>"submit","value"=>"Delete","class"=>"btn btn-danger"]),
             form_close();
                 ?>
                         </td>
                             
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
        
       
        
    </body>
    
</html>

<?php include("footer.php"); ?>