<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row pt-5 mt-5 d-flex justify-content-center">
            <h3 class="text-center">Add Employee</h3>
        </div>
        <div class="row pt-5 d-flex justify-content-center">
            <div class="col-5">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="firstname" value="<?php 
                            if(!empty($data['employee'])){ echo $data['employee']->firstname; } ?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lastname" value="<?php echo $data['employee']->lastname; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Age</label>
                            <input type="text" class="form-control" name="age">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Birthdate</label>
                            <input type="date" class="form-control" name="birth_date">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Job Title</label>
                            <input type="text" class="form-control" name="job_title">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Access Level</label><br>
                            <select name="access_level_id" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                            <?php foreach($data['access'] as $acc): ?>
                            <option selected>Choose...</option>
                            <option value="<?php echo $acc->access_level_id; ?>"><?php echo $acc->description; ?></option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                    </form>
            </div>
        </div>
    </div>
</body>
</html>

