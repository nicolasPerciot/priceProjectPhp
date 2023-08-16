


<div class="container-fluid">
    <div id="intro" class="row justify-content-center p-5">
    
          <div class=" p-4 border-white">
          
            <div class="p-5 -item-center col-12">
              <h1 class="p-3  text-center text-secondary backcolor rounded-5">Hello <?php if(!empty($_SESSION['username'])){echo($_SESSION['username']);} ?></h1>
            </div>
            
            <?php if(!empty($_SESSION['data'])){ ?>
            <table class="table text-secondary backcolor" >
                <thead>
                    <tr>
                        <th scope="col">Brand</th>
                        <th scope="col">Year</th>
                        <th scope="col">Kilometers Driven</th>
                        <th scope="col">Owner Type</th>
                        <th scope="col">Fuel Type</th>
                        <th scope="col">Transmission</th>
                        <th scope="col">Mileage</th>
                        <th scope="col">Engine</th>
                        <th scope="col">Power</th>
                        <th scope="col">Seats</th>
                        <th scope="col">New Price</th>
                        <th scope="col">Price</th>
                        <th scope="col">Modification/Suppression</th>
                    </tr>
                </thead>
                <tbody class="border-secondary">
                  <?php foreach( $_SESSION['data'] as $car){ ?>
                  <tr>                      
                    <td name="brand"><?php echo($car['brand']) ?></td>
                    <td name="year"><?php echo($car['year']) ?></td>
                    <td name="kilometerDriven"><?php echo($car['kilometersDriven']) ?></td>
                    <td name="ownerType"><?php echo($car['ownerType']) ?></td>
                    <td name="fuelType"><?php echo($car['fuelType']) ?></td>
                    <td name="transmission"><?php echo($car['transmission']) ?></td>
                    <td name="mileage"><?php echo($car['mileage']) ?></td>
                    <td name="engine"><?php echo($car['engine']) ?></td>
                    <td name="power"><?php echo($car['power']) ?></td>
                    <td name="seats"><?php echo($car['seats']) ?></td>
                    <td name="newPrice"><?php echo($car['newPrice']) ?></td>
                    <td name="price"><?php echo($car['price']) ?></td>
                    <td>
                      <form method="post" action="?model=Car&method=updateView">
                          <input type="hidden" name="carID" value="<?php echo($car['carID']) ?>">
                        <button type="submit" value="update" name="update" class="text-secondary col-10 offset-2"><i class="fa-solid fa-pen-to-square" width="30" height="30"></i></button>
                      </form>
                      <form method="post" action="?model=Car&method=delete">
                        <input type="hidden" name="carID" value="<?php echo($car['carID']) ?>">
                        <button type="submit" value="delete" name="delete" class="text-secondary col-10 offset-2"><i class="fa-solid fa-trash-can"></i></button> 
                      </form>
                    </td>
                  </tr>
                  <?php
                  }
                    
                } 
                ?>
                </tbody>
            </table>
            
        </div>
        
    </div>
  </div>
