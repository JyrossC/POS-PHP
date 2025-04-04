<?php 

require'function.php';

$paraResultId = checkParamId('id');



if(is_numeric($paraResultId)) {
    
    $customerId = validate('$paraResultId');
    $customerId = $paraResultId;
    $customer = getById('customers', $customerId);
    if($customer['status'] == 200)
    {
        $customerDeleteRes = delete('customers', $customerId);
        if($customerDeleteRes)
        {
            redirect('customers.php', '');
        }  
        else
        {
            redirect('customers.php', 'Something went wrong');
        }
    }
    else
    {
        redirect('customers.php', $customer['message']);
    }
    //echo $adminId;
} 
else 
{
    redirect('customers.php', 'Something went wrong');
}

?>