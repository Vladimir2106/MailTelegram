<?php 
$name=$_POST['name2'];
$tel=$_POST['tel2'];
$mail=$_POST['vud2'];

$token="6104271698:AAHuCGSrJ5Lr6Z2i9iBHX9oD4dFz-qvB4ig";
$chat_id="-1001948692899";



$info=array(
    ' Імя клиента - ' => $name,
    '  Телефон клиента - ' => $tel,
     '   Коментар - ' => $mail,
);

// с помощью цикла перебирается масив
foreach($info as $key => $value){
    $txt.= $key.$value;
};

//функция отправки в телеграм сообщения
$senttelega = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&text={$txt}","r");


if ($senttelega){
    header('location:/index.php');
}
else {
    echo ('Сообщение не отправлено');
}


$vce="
 <table style='border:2px solid #C1437A; padding:15px; margin-top: 5px;  background-color:#e4e8ed; display: flex;  flex-direction: column; gap:10rem;'>
   <tr>
   <td>
    <span style='font-weight: 700;'>Заявка з сайту HEADHUNTERS</span>
   </td>
  </tr>
 
  <tr>
   <td>
  Ім'я: $name
   </td>
  </tr>

  <tr>
   <td>
    Телефон: $tel
   </td>
  </tr>

  <tr>
   <td>
    Коментар: $mail
   </td>
  </tr>
 </table>
";

$to='wtime8405@gmail.com'; 
$massage="$vce";
$subject="Заявка з сайту HEADHUNTERS"; // тема письма
$headers = 'From: test@headhuntersleague.space' . "\r\n"; // загаловок 1 от кого прийдёт письмо, но их може быть много через точку
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; // обязательный загловок инаже будут ероглифы

//$headers .= $_POST['name2'] . "\r\n";
//$headers .= $_POST['tel2'] . "\r\n";
//$headers .= $_POST['vud2'] . "\r\n";
  

if(mail($to, $subject, $massage, $headers)){
    
   header('location: /index.php'); 
}
else {
    echo ('Письмо не отправлено');
}




?>




