<?php

if(isset($_POST['email'])) {

    $email_to = "hello@madg.events";

    $email_subject = "Contacto desde la web de #MADG";


    function died($error) {

        // your error code can go here

        echo "Ups! parece que hay algun error con los datos que has puesto.. ";

        echo "Puede ser esto?<br /><br />";

        echo $error."<br /><br />";

        echo "Por favor, intenta arreglarlos e intenta otra vez (:<br /><br />";

        die();

    }



    // validation expected data exists

    if(!isset($_POST['name']) ||

        !isset($_POST['email']) ||

        !isset($_POST['message'])) {

        died('No has rellenado nombre, email o mensaje.');

    }


    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];


    $email_message = "Form details below.\n\n";



    function clean_string($string) {

      $bad = array("content-type","bcc:","to:","cc:","href");

      return str_replace($bad,"",$string);

    }



    $email_message .= "Name: ".clean_string($name)."\n";

    $email_message .= "Email: ".clean_string($email)."\n";

    $email_message .= "Message: ".clean_string($message)."\n";


	// create email headers

	$headers = 'From: '.$email."\r\n".

	'Reply-To: '.$email."\r\n" .

	'X-Mailer: PHP/' . phpversion();

	@mail($email_to, $email_subject, $email_message, $headers);


?>



<!-- include your own success html here -->



Gracias por ponerte en contacto con nosotros. Tendrás noticias nuestras en breves (:



<?php

}

?>
