<?php include('includes/header.php');?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Edit and Update Student
                        <a href="manage-student.php" class="btn btn-danger float-end">Back</a></h4>
                </div>
                <div class="card-body ">
                    <?php
                    include('dbcon.php');
                    if(isset($_GET['id'])){
                       $key_child = $_GET['id']; //to get the id of the child taht you wanna edit
                       $ref_table = 'students';
                       $update_student = $database->getReference($ref_table)->getChild($key_child)->getValue();

                       if($update_student > 0) {
                           ?>
                           
                    <form action="code.php" method="POST">
                        <input type="hidden" name="key" value="<?=$key_child;?>">
                        <div class="form-group mb-3">
                            <label for="first_name">First Name:</label>
                            <input type="text" name="first_name" id="first_name" value="<?=$update_student['fname'];?>" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="last_name">Last Name:</label>
                            <input type="text" name="last_name" class="form-control" value="<?=$update_student['lname'];?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email:</label>
                            <input type="email" name="email" class="form-control" value="<?=$update_student['email'];?>">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="updateStudent" class="btn btn-primary primary"><a href="manage-student.php"></a>Update</button>
                        </div>
                    </form>
                    <?php
                       }
                       else {
                        $_SESSION['status'] = 'No record found!';
                        header('Location: manage-student.php');
                        exit();
                       }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php');?>