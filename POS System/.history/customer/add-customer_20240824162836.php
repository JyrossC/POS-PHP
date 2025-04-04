<?php 

include('../header.php');
include('function.php');
include('header1.php');
include('navbar.php');


?>

<div style="margin-top: 10px; text-decoration: none; margin-left: 1%;" >
    <button type="button" class="btn btn-secondary" >
        <a href="customers.php" style="text-decoration: none; color:antiquewhite; ">Go Back</a>
    </button>
</div>

<div class="container-fluid px-4" style="margin-top: -60px; width: 90%; margin-left: 10%;">
    <div class="card mt-4 shadow">
        <div class="card-header">
            <small class="mb-o">Add Customer</small>
        </div>
        <div class="card-body">
            <?php alertMessage(); ?>

            <form action="code.php" method="POST">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Customer Name</label>
                        <input type="text" name="name" required class="form-control" />
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Email</label>
                        <input type="email" name="description" class="form-control" rows="3"></input>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Phone Number</label>
                        <input type="number" name="phone" class="form-control" rows="3"></input>
                    </div>
                    <!-- <div class="col-md-4 mb-3">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control"></input>
                    </div> -->
                    


                    <div class="col-md-6">
                        <label for="">Status (unChecked=Visible, Checked=Hidden)</label>
                        <br>
                        <input type="checkbox" name="status" style="width: 30px; height: 30px;" />
                    </div>
                    <div class="col-md-6 mb-3 text-between"  >
                        <br>
                        <button type="submit" name="saveCustomer" class="btn btn-success" style="margin-right: 20px;" >Save</button>
                        <a href="customers.php" class="btn btn-secondary ">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>



    </div>
        </div>