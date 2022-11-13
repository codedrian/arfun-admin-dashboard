<?php include('includes/header.php');?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        ARFUN Crud - Realtime Database
                        <a href="manage-student.php" class="btn btn-danger float-end">Back</a></h4>
                </div>
                <div class="card-body ">
                    <form action="code.php" method="POST">
                        <div class="form-group mb-3">
                            <label for="first_name">First Name:</label>
                            <input type="text" name="first_name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="last_name">Last Name:</label>
                            <input type="text" name="last_name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email:</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="save" class="btn btn-primary primary"><a href="manage-student.php"></a>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php');?>
    