<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
error_reporting(0);
ini_set('display_errors', 0);

// db:africand_smartrev
// user:africand_sr
// pass: Raven254#$

$servername = "localhost";
$username = "africand_sr";
$password = "Raven254#$";
$dbname = "africand_smartrev";

$mpesastate = 0;

// $conn = mysqli_connect($servername,$username,$password,$dbname);
$conn = mysqli_connect("localhost","africand_sr","Raven254#$","africand_smartrev");



// Check connection
if (!$conn) {
    //Return a success response to m-pesa
    $response = array(
        'ResultCode' => 1,
        'ResultDesc' => 'Fail'
    );
 
    echo json_encode($response);
    die("Connection failed: " . mysqli_connect_error());
}

$callbackJSONData=file_get_contents('php://input');

//decode the json into associative array
$decodedCallBackResponse=json_decode($callbackJSONData,true);

          $merchantRequestID=$decodedCallBackResponse['Body']['stkCallback']['MerchantRequestID'];
           $mpesaReceiptNumber = $decodedCallBackResponse['Body']['stkCallback']['CallbackMetadata']['Item'][1]['Value'];
            $phone = $decodedCallBackResponse['Body']['stkCallback']['CallbackMetadata']['Item'][4]['Value'];
            $transactionDate = $decodedCallBackResponse['Body']['stkCallback']['CallbackMetadata']['Item'][3]['Value'];
            $amount = $decodedCallBackResponse['Body']['stkCallback']['CallbackMetadata']['Item'][0]['Value'];
            $resultCode = $decodedCallBackResponse['Body']['stkCallback']['ResultCode'];
            $resultDesc = $decodedCallBackResponse['Body']['stkCallback']['ResultDesc'];
            $checkoutRequestID=$decodedCallBackResponse['Body']['stkCallback']['CheckoutRequestID'];
            $status = 0;
            $FinalPhoneNumber = substr($phone, 3);
        if($resultCode == 0){

    $sql33 = "SELECT * FROM orders WHERE ProState = '0' && MerchantRequestID = '$merchantRequestID' && amountPaid = '$amount' &&  UserPhoneNumber = '$FinalPhoneNumber'";
    $result33 = mysqli_query($conn,$sql33);
    $info = mysqli_fetch_array( $result33 );
    $count33 = mysqli_num_rows($result33);
    $isOrderID = $info["id"];
    
    if($count33 == 1) {
        $mpesastate = 1;
        $sql44 = "UPDATE orders SET MpesaState = '1'  WHERE id = '$isOrderID'";
        if(mysqli_query($conn, $sql44)){} else{}

    
        
    }else{
        $mpesastate = 3;
        
        $sql44 = "SELECT * FROM orders WHERE ProState = '0' && MerchantRequestID = '$merchantRequestID' ";
        $result44 = mysqli_query($conn,$sql44);
        $info44 = mysqli_fetch_array( $result44);
        $count44 = mysqli_num_rows($result44);
        $isOrderID44 = $info44["id"];
        if($count44 == 1) {
            $sql44 = "UPDATE orders SET ProState = '4'  WHERE id = '$isOrderID44'";
            if(mysqli_query($conn, $sql44)){} else{}
        }
    }
    $sql="INSERT INTO mpesa (resultCode, resultDesc, merchantRequestID,   checkoutRequestID,   amount,   mpesaReceiptNumber, transactionDate,   phoneNumber, state) VALUES 
                     ('$resultCode','$resultDesc','$merchantRequestID','$checkoutRequestID','$amount','$mpesaReceiptNumber','$transactionDate','$phone','$status')";
            
      mysqli_query($conn,$sql);
      
      //redirect user to "we successfully received your payments page"
        }
            
   else{ 
       //unsuccesful payments
$sql="INSERT INTO mpesa (resultCode, resultDesc, merchantRequestID,   checkoutRequestID,   amount,   mpesaReceiptNumber, transactionDate,   phoneNumber, state) VALUES 
                     ('$resultCode','$resultDesc','$merchantRequestID','$checkoutRequestID','$amount','$mpesaReceiptNumber','$transactionDate','$phone','$status')";
            
      mysqli_query($conn,$sql);
       
       //good point to redirect the person who triggered the payment with instructions to pay directly via paybill.
   }    

mysqli_close($conn);

?>
