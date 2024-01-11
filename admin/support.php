<?php include 'header.php';?>
<div id="page-wrapper">
    <div class="alert alert-default" style="color:white;background-color:#008CBA">
        <center>
        <h5>Messages</h5>
        </center>
    </div>

    <table id="tblrecord" class="table w-100 table-bordered ">
                                                                                          
        <thead style="text-align:center;">
            <tr>
                <th style="color:white;">Email</th>
                <th style="color:white;">Name</th>
                <th style="color:white;">Message</th>
            </tr>
        </thead>
        
            <tbody>
                <?php
                    $sql=mysqli_query($conn,"SELECT * FROM `support`");
                   
                    if(mysqli_num_rows($sql)>0)
                    {
                        while($row=mysqli_fetch_assoc($sql))
                        {  
                            ?>

                        <tr>
              
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?> </td>
                            <td><?php echo $row['message']; ?></td>
                            
                        </tr>

                    <?php   
                         }
                    }   
                    ?>
            </tbody>
        </table>
</div>
<?php include 'footer.php';?>