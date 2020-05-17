

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
   <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
    <title>Contact</title>

    <link rel="shortcut icon" type="image/png" href="images/favicon.png" />

    <!-- Styles -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/contact.css">
</head>
<body link="white" vlink="white" alink="white">
<body>
    <header>

    </header>

    <!-- Contact section -->
    <section style="padding-top: 100px; padding-bottom: 90px;" class="about">
        <div class="about-header">
            <h1>Contact</h1>
        </div>
        <div class="card">
         <form method="POST" >
                <input name="emails" type="text" class="feedback-input" placeholder="Emails" required value="<?php if (isset($_POST['submit'])) { echo $_POST['emails'];}?>"/>
                <input name="subject" type="text" class="feedback-input" placeholder="Subject" required value="<?php if (isset($_POST['submit'])) { echo $_POST['subject'];}?>"/>
                <textarea name="message" class="feedback-input" placeholder="Message" required></textarea>
                <input type="submit" name="submit" value="SUBMIT" />

                        <?php


                            if(isset($_POST["submit"])) {

                                $email = $_POST['emails'];
                                $ema=explode(" ", $email);

                                foreach ($ema as $key => $value) {
                                    $subject = "=?utf-8?B?". base64_encode($_POST['subject']). "?=";
                                    $message = $_POST['message'];
                                    $formcontent = $message;
                                    $mailheader = 'From: '.$value . "\r\n" .
                                        'Reply-To: tsubulko.manager@gmail.com'. "\r\n" .
                                        'X-Mailer: PHP/' . phpversion().'Content-type: text/html; charset=utf-8';



                                    $recipient = $value;
                                    if (!preg_match("/^((([0-9A-Za-z]{1}[-0-9A-z\.]{1,}[0-9A-Za-z]{1})|([0-9А-Яа-я]{1}[-0-9А-я\.]{1,}[0-9А-Яа-я]{1}))@([-A-Za-z]{1,}\.){1,2}[-A-Za-z]{2,})$/u"
                                        , $recipient)) {
                                        $mes = "Wrong mail number " . $key;
                                    } else {
                                        $mes = "";
                                        //$mes = "Your massage sended!";
                                        mail($recipient, $subject, $formcontent, $mailheader) or die("Error! Mail number " . $key);
                                    }
                                    echo $mes;
                                }
                            }
                        ?>
            </form>
        </div>




    </section>
<br>
<br>
<br>
<br>
<br>

	<footer>
			<p>&#169; 2020 <a href="https://www.instagram.com/orange_list/?hl=ru">KSENIA TSYBULKO</a></p>
		</footer>
</body>
</html>