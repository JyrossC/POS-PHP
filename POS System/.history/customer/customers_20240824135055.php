<?php 

include('../header.php');
include('function.php');



?>


<div class="container mt-5 px-4">
    <div class="card mt-4 shadow-lg">
        <div class="card-header">
            <h4 class="mb-0">Customers
                <a href="add-customers.php" class="btn btn-primary float-end">Add Customers</a>
            </h4>
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
                <table class="table table-striped table-bordered">
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
                                    echo '<span class="badge bg-danger">Hidden</span>';
                                   }
                                   else
                                   {
                                    echo '<span class="badge bg-success">Visible</span>';
                                   }
                                ?>

                            </td>
                            <td>
                                <a href="customers-edit.php?id=<?= $item['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="customers-delete.php?id=<?= $item['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
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
