    <div class="container">
        <div class="row pt-5 mt-5 d-flex justify-content-end">
            <a class="btn btn-primary col-2 mx-2" href="<?php echo URLROOT.'/exam/add_employee' ?>" role="button">Add Employee</a>
            <a class="btn btn-primary col-2 mx-2" href="<?php echo URLROOT.'/exam/access_levels' ?>" role="button">Access Levels</a>
            <a class="btn btn-danger col-1" href="<?php echo URLROOT.'/exam/logout' ?>" role="button">Logout</a>
        </div>
        <div class="row mt-5">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Age</th>
                        <th>Birth Date</th>
                        <th>Email</th>
                        <th>Date Created</th>
                        <th>Job Title</th>
                        <th>Access Level</th>
                        <th>Date Modified</th>
                        <th>Modify</th>
                    </tr>
                </thead>
                <?php foreach($data['employees'] as $emp): ?>
                <tr>
                    <td><?php echo $emp->id; ?></td>
                    <td><?php echo $emp->firstname; ?></td>
                    <td><?php echo $emp->lastname; ?></td>
                    <td><?php echo $emp->age; ?></td>
                    <td><?php echo $emp->birth_date; ?></td>
                    <td><?php echo $emp->email; ?></td>
                    <td><?php echo $emp->date_created; ?></td>
                    <td><?php echo $emp->job_title; ?></td>
                    <td><?php echo $emp->access_level_id; ?></td>
                    <td><?php echo $emp->date_modified; ?></td>
                    <td>
                        
                        <a href="<?php echo URLROOT.'/exam/add_employee/'.$emp->id; ?>" type="button" class="btn btn-outline-warning">Edit</a>
                        <?php if($_SESSION['access_level'] == 1): ?>
                        <a href="<?= URLROOT.'/exam/delete/'.$emp->id;  ?>" type="button" class="btn btn-outline-danger <?= $emp->id == 1 ? 'disabled': '' ?> ">Delete</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
</body>
</html>