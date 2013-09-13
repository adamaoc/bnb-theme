<?php 
error_reporting(E_ALL);

function contact_email($name, $email, $phone, $message){

	$name = htmlentities($name);
	$email = htmlentities($email);
	$phone = htmlentities($phone);
	$message = htmlentities($message);
	
	$innerSubject = 'Message from B and B website';
	$innerMessage = 'Message from '.$name."\r\n".$email."\r\n".$phone."\r\n".$message; 
	$headers = 'From: laurenmanry@dfwbelliesandbabies.com';
	
	mail('laurenmanry@dfwbelliesandbabies.com', $innerSubject, $innerMessage, $headers);

	$_POST['submitted-form'] = 'true';
}

require_once "formvalidator.php";

if(isset($_POST['Send']))
{// The form is submitted

    //Setup Validations
    $validator = new FormValidator();
    $validator->addValidation("cust-name","req","- Please fill in Name");
    $validator->addValidation("email","email","- The input for Email should be a valid email value");
    $validator->addValidation("email","req","- Please fill in Email");
    $validator->addValidation("phone","req","- Please enter a Phone Number");
    $validator->addValidation("phone","regexp=/(?:1-?)?(?:\(\d{3}\)|\d{3})[-\s.]?\d{3}[-\s.]?\d{4}/","- Plese enter a valid Phone Number");
    $validator->addValidation("auth", "req", "- Please verify that you are human by entering <strong>YES</strong> into the authentication area below.");
    $validator->addValidation("auth", "regexp=(yes|YES)", "- You did not type <strong>YES</strong> in the authentication area...");
    // Now, validate the form
    if($validator->ValidateForm())
    {
        //Validation success. 
        contact_email($_POST['cust-name'], $_POST['email'], $_POST['phone'], $_POST['message']);
    }
    else
    {
        $error_hash = $validator->GetErrors();
        // print_r($error_hash);
        foreach($error_hash as $inpname => $inp_err)
        {
        	$errorname = "error-".$inpname;
            $_POST[$errorname] = $inp_err;
        }        

    }//else
}//if(isset($_POST['Submit']))

?>