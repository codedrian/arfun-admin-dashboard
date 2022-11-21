<?php include('includes/header.php');?>

<div class="container">
    <div class="row">
        <div class="col-md-6 mb-2">
            <div class="card">
                <div class="card-body">
                    <h4>Total Student:
                        <?php 
                        include('dbcon.php');
                        $ref_table = 'students';
                        $count_student = $database->getReference($ref_table)->getSnapshot()->numChildren();
                        echo $count_student;
                        ?>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        ARFUN E-Learning Admin Panel
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
                                        <th>Section</th>
                                        <th>LRN Number</th>
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
                                                <td><?=$row['section']; ?></td>
                                                <td><?=$row['lrn_number']; ?></td>
                                                <td>
                                                <button>  
                                                <a href="edit-student.php?id=<?=$key;?>" class="btn btn-primary btn-sm">Edit</a></button>  
                                                </td>
                                                <td>
                                                    <!-- <a href="edit-student.php" class="btn btn-danger btn-sm">Delete</a> -->
                                                    <form action="code.php" method="post">
                                                        <button type="submit" class="btn btn-primary" name="delete_button" value="<?=$key?>">Delete</button>
                                                    </form>
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