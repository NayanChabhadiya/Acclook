<?php
session_start();
error_reporting(0);
include "../connection.php";
$user_profile = $_SESSION['user_email'];
if($user_profile==true)
{

}
else
{
  header('location:../login.php');
}
$query = "SELECT * FROM USERS WHERE email='$user_profile'";
$data = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($data);
$user_id = $result['id'];
?>
<?php
// $con=mysqli_connect('localhost','root','','acclook');
if (isset($_POST['payment']) && $_POST['amt'] >=99) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $amount=$_POST['amt'];
    $pay_to='Acclook Foundation';
    include 'instamojo\Instamojo.php';
    $api = new Instamojo\Instamojo('test_3fca8eebb469e6292a0003326f6', 'test_69ae86fc88c4fccf0809d1641df', 'https://test.instamojo.com/api/1.1/');
    try {
        $response = $api->paymentRequestCreate(array(
            "purpose" => $pay_to,
            "user_name" => $name,
            "email" => $email,
            "phone" => $phone,
            "amount" => $amount,
            "send_email" => true,
            "allow_repeated_payments" => false,
            "redirect_url" => "http://localhost/php/1.GITHUB/ACCLOOK-WITH-PHP/payment/thankyou.php"
            ));
       // print_r($response);
        $url=$response['longurl'];
        header("location:$url");
        }
        catch (Exception $e) {
            print('Error: ' . $e->getMessage());
        }
        $query="INSERT INTO transaction (user_id,user_name,user_email,user_phone,amount,pay_to) VALUES ('$user_id','$name','$email','$phone','$amount','$pay_to')";
        $run=mysqli_query($conn,$query);
    }
?>
