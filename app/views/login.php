<div class="container">
    <div class="row justify-content-md-center vh-100">
        <div class="col-4 align-self-center">
            <div class="my-3 text-danger">
                <?php if($data['x']) { echo $data['message'];} ?>
            </div>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" >
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>