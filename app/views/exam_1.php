<div class="container">
    <div class="row justify-content-md-center vh-100">
        <div class="col-4 align-self-center">
            <h3>Fibonacci</h3>
            <form action="" method="POST">
                <?php if($data['x']) { echo $data['message'];} ?>
                <div class="mb-3 mt-5">
                    <label for="exampleInputEmail1" class="form-label">Enter a Fibonaci Sequence:</label>
                    <input type="number" name="input" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>