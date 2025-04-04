<?php

include('../header.php');
include('function.php');


?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow">
        <div class="card-header">
            <h4 class="mb-o">Add Customer
                <a href="customers.php" class="btn btn-danger float-end">Cancel</a>
            </h4>
        </div>
        <div class="card-body">
            <?php alertMessage(); ?>

            <form action="code.php" method="POST">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Customer Name</label>
                        <input type="text" name="name" required class="form-control" />
                    </div>
                    <!-- <div class="col-md-12 mb-3">
                        <label for="">Email</label>
                        <input type="email" name="description" class="form-control" rows="3"></input>
                    </div> -->
                    <div class="col-md-12 mb-3">
                        <label for="">Phone</label>
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
                    <div class="col-md-6 mb-3 text-end">
                        <br>
                        <button type="submit" name="saveCustomer" class="btn btn-success">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    </div>
        </div>