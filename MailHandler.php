<?php
$owner_email = 'info@mail.ru';
$site_name = 'Site.ru';
$UTM = false;


$headers = 'From:' . trim($_POST["email"]);
$subject = 'Заказ обратного звонка' ;

$messageBody = "";

if (isset($_POST['name'])){
    $messageBody .= '<p><b>Имя:</b> ' . trim($_POST["name"]) . '</p>' . "\n";
    $messageBody .= '<br>' . "\n";
    }

if (isset($_POST['phone'])){
    $messageBody .= '<p><b>Телефон:</b> ' . trim($_POST['phone']) . '</p>' . "\n";
    $messageBody .= '<br>' . "\n";
    }
    
if (isset($_POST['email'])){
    $messageBody .= '<p><b>Email:</b> ' . $_POST['email'] . '</p>' . "\n";
    $messageBody .= '<br>' . "\n";
    }
    
if (isset($_POST['message'])){
    $messageBody .= '<p><b>Сообщение:</b> ' . $_POST['message'] . '</p>' . "\n";
    }

if ($UTM == true){
    $messageBody .= "\n" . '<hr> <h4>UTM метки:</h4>' . "\n";
    }

try{
if(!mail($owner_email, $subject, $messageBody, $headers)){
throw new Exception('mail failed');
}else{
echo 'mail sent';
}
}catch(Exception $e){
echo $e->getMessage() ."\n";
}
?>