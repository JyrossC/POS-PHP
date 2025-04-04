<?php 

include('../header.php');
include('function.php');
include('header1.php');
include('navbar.php');



?>

<div class=" mt-5 py-3" style="margin-left: 3%; text-decoration: none;" >
    <button type="button" class="btn btn-secondary" >
        <a href="../index.php" style="text-decoration: none; color:antiquewhite; ">Go Back</a>
    </button>
</div>

<div class="container-fluid px-4" style="margin-top: -85px; width: 90%; margin-left: 10%;" >
    <div class="card mt-4 transparent">
        <div class="card-header">
            <small class="mb-0">Customer List
                <a href="add-customer.php" class="btn btn-primary float-end">Add Customers</a>
            </small>
        </div>
        <div class="card-body">
            <?php alertMessage(); ?>

            <?php
                $customers = getAll('customers');
                if(!$customers){
                    echo '<h4>Something Went Wrong</h4>';
                    return false;
                }
                if(mysqli_num_rows($customers) > 0)
                {

                
            ?>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <!-- <th>Email</th> -->
                            <th>Phone</th>
                            <!-- <th>image</th> -->
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php foreach($customers as $item) : ?>
                        <tr>
                            <td><?=$item['id']; ?></td>
                            <td><?=$item['name']; ?></td>
                            <!-- <td><?=$item['email']; ?></td> -->
                            <td><?=$item['phone']; ?></td>
                            <!-- <td><?=$item['image']; ?></td> -->

                            <td class="justify-content-center">
                                <?php
                                   if($item['status'] == 1 )
                                   {
                                    echo '<span class="badge bg-light text-dark">Hidden</span>';
                                   }
                                   else
                                   {
                                    echo '<span class="badge bg-light text-dark">Visible</span>';
                                   }
                                ?>

                            </td>
                            <td>
                                <a href="edit-customer.php?id=<?= $item['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="delete-customer.php?id=<?= $item['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                       
                    </tbody>
                </table>
            </div>

             
            <?php
                        }
                        else
                        {
                            ?>
                            <tr>
                                <h4 class="mb-0">No record found</h4>
                            </tr>
                            <?php
                        }
                        ?>


        </div>
    </div>

    </div>
</div>

<!-- <div class="footer">
    <footer>
            <div class="row">
                <div class="col-4">
                <div class="card">
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </footer>
</div> -->
