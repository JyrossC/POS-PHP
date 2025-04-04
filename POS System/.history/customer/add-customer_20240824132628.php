<?php

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

?>