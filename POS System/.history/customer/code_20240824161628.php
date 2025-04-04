<?php
include("function.php");



if (isset($_POST['saveAdmin'])) {

    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $phone = validate($_POST['phone']);
    $is_ban = validate($_POST['is_ban']) == true ? 1: 0;

    if ($name != '' && $email != '' && $password != '') {
        //$emailCheck = "SELECT * FROM admins WHERE email= '$email'"
        $emailCheck = mysqli_query($conn, "SELECT * FROM admins WHERE email = '$email'");
        if ($emailCheck) {
            if (mysqli_num_rows($emailCheck) > 0) {
                redirect('admins-create.php','Email already exists');
            }
        }

        $bcrypt_password = password_hash($password, PASSWORD_BCRYPT);

        $data = [
            'name' => $name,
            'email' => $email,
            'password'=> $bcrypt_password,
            'phone'=> $phone,
            'is_ban'=> $is_ban
        ];
        $result = insert('admins', $data);
        if ($result) {
            redirect('admins.php','Admin Created Successfully');
        } else {
            redirect('admins-create.php','Something went wrong');
        }

    }else {
        redirect('admins-create.php', 'Please fill in the required fields');
    }
}

if (isset($_POST['updateAdmin'])) {
    $adminId = validate($_POST['adminId']);

    $adminData = getById('admins', $adminId);
    if ($adminData['status'] != 200) {
        redirect('admins-edit.php?id='.$adminId,'Please Fill in the Required Fields');
    } else {

    }

    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $phone = validate($_POST['phone']);
    $is_ban = validate($_POST['is_ban']) == true ? 1 : 0;

    $emailCheckQuery = "SELECT * FROM admins WHERE email='$email' AND id != '$adminId'";
    $checkResult = mysqli_query($conn, $emailCheckQuery);
    if ($checkResult) {
        if(mysqli_num_rows($checkResult) > 0) {
            redirect('admins-edit.php?id='.$adminId,'Email is Already Taken');
        }
    }


    if($password != '')
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    }else{
        $hashedPassword = $adminData['data']['password'];
    }

    if ($name != '' && $email != '') {

         $data = [
            'name' => $name,
            'email' => $email,
            'password'=> $hashedPassword,
            'phone'=> $phone,
            'is_ban'=> $is_ban
        ];
        $result = update('admins', $adminId, $data);
        if ($result) {
            redirect('admins-edit.php?id='.$adminId,'Admin updated Successfully');
        } else {
            redirect('admins-edit.php?id='.$adminId,'Something went wrong');
        }

    }else {
        redirect('admins-create.php', 'Please fill in the required fields');
    }
}

if(isset($_POST['saveCategory']))
{
    $name = validate($_POST['name']);
    $description = validate($_POST['description']);
    $status = validate($_POST['status']) == true ? 1:0;


    $data = [
        'name' => $name,
        'description' => $description,
        'status'=> $status
    ];
    $result = insert('categories', $data);
    if ($result) {
        redirect('categories.php','Category Created Successfully');
    } else {
        redirect('categories-create.php','Something went wrong');
    }
}


if(isset($_POST['updateCategory']))
{
    //Validate Inputs Update
    $categoryId = validate($_POST['categoryId']);
    
    $name = validate($_POST['name']);
    $description = validate($_POST['description']);
    $status = validate($_POST['status']) == true ? 1:0;
    
    //Pass Data to the System Page
    $data = [
        'name' => $name,
        'description' => $description,
        'status'=> $status
    ];

    //Update the data array with new data
    $result = update('categories', $categoryId, $data);
    if ($result) {
        redirect('categories-edit.php?id='.$categoryId,'Category Updated Successfully');
    } else {
        redirect('categories-edit.php?id='.$categoryId,'Something went wrong');
    }
}

if(isset($_POST['saveProduct']))
{
    //Validate Inputs
    $category_id = validate($_POST['category_id']);
    $name = validate($_POST['name']);
    $description = validate($_POST['description']);
    $price = validate($_POST['price']);
    $quantity = validate($_POST['quantity']);
    $status = isset($_POST['status']) == true ? 1:0;
    $created_at = validate($_POST['created_at']);
    
    //Check if image exists and it's valid extension and then upload it
    if($_FILES['image']['size'] > 0)
    {
        $path = "../assets/uploads/products";
        $image_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

        $filename = time() .'.'. $image_ext;

        //Move File to the specified/absolute/targeted path
        move_uploaded_file($_FILES['image']['tmp_name'], $path . "/" . $filename);
        $finalImage = "assets/uploads/products/".$filename;
    }
    else
    {
        $finalImage = "";
    }

    //Pass Data to the System Page
    $data = [
        'category_id' => $category_id,
        'name'=> $name,
        'description' => $description,
        'price' => $price,
        'quantity' => $quantity,
        'image' => $finalImage,
        'status'=> $status,
        'created_at' => $created_at


        
    ];
    $result = insert('products', $data);
    if ($result) {
        redirect('products.php','products Added Successfully');
    } else {
        redirect('products-create.php','Something went wrong');
    }
}


if(!isset($_SESSION['saveCustomer']))
    {
      $name = validate($_POST['name']);
    //   $email = validate($_POST['email']);
      $phone = validate($_POST['phone']);
      $status = isset($_POST['status']) ? 1:0;
    
      //Validate Image Input
    //   if($_FILES['image']['size'] > 0)
    //     {
    //         $path = "../assets/uploads/";
    //         $image_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

    //         $filename = time() .'.'. $image_ext;

    //         //Move File to the specified/absolute/targeted path
    //         move_uploaded_file($_FILES['image']['tmp_name'], $path . "/" . $filename);
    //         $finalImage = "..assets/uploads/products/".$filename;
    //     }
    //     else
    //     {
    //         $finalImage = "";
    //     }


       if($name != '')
       {
            // $emailCheck = mysqli_query($conn, "SELECT * FROM customers WHERE email='$email'");
            // if($emailCheck)
            // {
            //     if(mysqli_num_rows($emailCheck) > 0)
            //     {
            //         redirect ('customers.php','Email exists');
            //     }
            // }

            $data = [
                'name'=> $name,
                // 'email'=> $email,
                'phone'=> $phone,
                'status'=> $status,
                // 'image'=> $finalImage
            ];

            $result = insert('customers', $data);
            if($result)
            {
                redirect('customers.php','Customer Created Successfully');
            }
            else
            {
                redirect('customer-create.php','Something Went Wrong');
            }
       }
       else
       {
            redirect ('customers.php','Fill in the required fields');
       } 

    }

if(isset($_POST['updateCustomer']))
{
    $customerId = validate($_POST['customerId']);


    $name = validate($_POST['name']);
    //   $email = validate($_POST['email']);validate($_POST['phone']);
      $status = isset($_POST['status']) ? 1:0;
    
      //Validate Image Input
    //   if($_FILES['image']['size'] > 0)
    //     {
    //         $path = "../assets/uploads/";
    //         $image_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

    //         $filename = time() .'.'. $image_ext;

    //         //Move File to the specified/absolute/targeted path
    //         move_uploaded_file($_FILES['image']['tmp_name'], $path . "/" . $filename);
    //         $finalImage = "..assets/uploads/products/".$filename;
    //     }
    //     else
    //     {
    //         $finalImage = "";
    //     }


       if($name != '')
       {
            // $emailCheck = mysqli_query($conn, "SELECT * FROM customers WHERE email='$email' AND id!='$customerId'");
            // if($emailCheck)
            // {
            //     if(mysqli_num_rows($emailCheck) > 0)
            //     {
            //         redirect ('edit-customers.php?='.$$customerId,'Email exists');
            //     }
            // }

            $data = [
                'name'=> $name,
                // 'email'=> $email,
                'phone'=> $phone,
                'status'=> $status,
                // 'image'=> $finalImage
            ];

            $result = update('customers', $data);
            if($result)
            {
                redirect('customers.php','Customer Created Successfully');
            }
            else
            {
                redirect('customer-create.php','Something Went Wrong');
            }
       }
       else
       {
            redirect ('customers.php','Fill in the required fields');
       } 
    
}


?>