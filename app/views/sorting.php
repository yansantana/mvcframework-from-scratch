<div class="container">
    <div class="row justify-content-md-center vh-100">
        <div class="col-4 align-self-center">
            <h3>Sorting</h3>
            <form action="" method="POST">
                <div class="my-3">
                    <?php if($data['x']) { echo $data['message'] . '</b>';} ?>
                </div>
                <div class="mb-3 mt-3">
                    <label for="exampleInputEmail1" class="form-label">Enter an Array of numbers: (separated by spaces)</label>
                    <textarea type="textarea" name="input" class="form-control"></textarea>
                </div>
                <div class="form-check">
                    <input name="sortby" class="form-check-input" type="radio" value="1" id="flexRadioDefault1" cheacked>
                    <label class="form-check-label" for="flexRadioDefault1">
                        1
                    </label>
                </div>
                <div class="form-check">
                    <input name="sortby"class="form-check-input" type="radio" id="flexRadioDefault2" value="2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        2
                    </label>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Sort</button>
            </form>
        </div>
    </div>
</div>