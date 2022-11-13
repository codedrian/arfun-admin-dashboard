<?php include('includes/header.php');?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        ARFUN Crud - Realtime Database
                        <a href="add-student.php" class="btn btn-primary">Add Student</a>
                        <a href="index.php" class="btn btn-danger float-end">Back</a></h4>
                </div>
                <div class="card-body ">
                    <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email Adress</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php //always include db connection
                                    include('dbcon.php');
                                    $ref_table = 'students';
                                    $fetch_students = $database->getReference($ref_table)->getValue();

                                    
                                    if($fetch_students > 0){
                                        $i = 1;
                                        foreach($fetch_students as $key => $row){
                                            ?>
                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$row['fname']; ?></td>
                                                <td><?=$row['lname']; ?></td>
                                                <td><?=$row['email']; ?></td>
                                                <td>
                                                    <a href="edit-student.php?id=<?=$key;?>" class="btn btn-primary btn-sm">Edit</a>
                                                </td>
                                                <td>
                                                    <a href="edit-student.php" class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else {
                                        ?>
                                        <tr>
                                            <td colspan="7">No Record Found</td>
                                        </tr>
                                        <?php
                                    }
                        
                                    ?>

                                   
                                    <tr>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php');?>