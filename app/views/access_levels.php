<div class="container">
        <div class="row pt-5 mt-5 d-flex justify-content-center">
            <h3 class="text-center">Access Levels</h3>
        </div>
        <div class="row pt-5 mt-5 d-flex justify-content-center">

            <form class="col-5"  action="" method="POST">
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="inputPassword6" class="col-form-label">Description</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" name="description" id="inputPassword6" class="form-control" placeholder="User">
                    </div>
                    <div class="col-auto">
                    <button name="submit" type="submit" class="btn btn-primary">Add Access Level</button>
                    </div>
                </div>
            </form>

        </div>
        <div class="row pt-5 d-flex justify-content-center">
            <div class="col-5">
                <div class="row mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($data['access'] as $acc): ?>
                    <tr>
                        <td><?php echo $acc->description; ?></td>
                        <?php if($_SESSION['access_level'] == 1): ?>
                        <td>
                            <a href="<?= URLROOT.'/exam/delete_access/'.$acc->access_level_id;  ?>" type="button" class="btn btn-outline-danger <?= $acc->access_level_id == 1 ? "disabled" :  '' ?>">Delete</a>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
                
            </div>
        </div>
    </div>
</body>
</html>

