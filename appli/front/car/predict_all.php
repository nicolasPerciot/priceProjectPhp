

    <div class="container-fluid">
        <div id="intro" class="row justify-content-center p-5">
            <div class="col-xl-5 col-md-8 p-5">
                <h1 class="p-2 text-warning backcolor rounded-3 text-center">Predict All</h1>
                <form class="backcolor rounded-5 shadow-5-strong p-5" action="?model=Car&method=predictAll" method="post" >
                    <!-- Form input -->
                    <div class="form-outline mb-4">
                    <label class="form-label text-danger" for="brand">Brand</label>
                    <input type="text" id="brand" class="form-control" name="brand" />
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label text-warning" for="year">Year</label>
                    <input type="text" id="year" class="form-control" name="year" />
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label text-success" for="kilometersDriven">Kilometers_Driven</label>
                    <input type="text" id="kilometersDriven" class="form-control" name="kilometersDriven"/>

                </div>

                <div class="form-outline mb-4">
                    <label class="form-label text-danger" for="ownerType">Owner_Type</label>
                    <input type="text" id="ownerType" class="form-control" name="ownerType"/>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label text-warning" for="fuelType">Fuel_Type</label>
                    <input type="text" id="fuelType" class="form-control" name="fuelType"/>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label text-success" for="transmission">Transmission</label>
                    <input type="text" id="transmission" class="form-control" name="transmission"/>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label text-danger" for="mileage">Mileage</label>
                    <input type="text" id="mileage" class="form-control" name="mileage"/>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label text-warning" for="engine">Engine</label>
                    <input type="text" id="engine" class="form-control" name="engine"/>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label text-success" for="power">Power</label>
                    <input type="text" id="power" class="form-control" name="power"/>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label text-danger" for="seats">Seats</label>
                    <input type="text" id="seats" class="form-control" name="seats"/>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label text-warning" for="newPrice">New_Price</label>
                    <input type="text" id="newPrice" class="form-control" name="newPrice"/>
                </div>

                <input type="hidden" name="userID" value="<?php echo($_SESSION['userID']) ?>">
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block" name="save">Predict</button>
                </form>
            </div>
        </div>
    </div>
