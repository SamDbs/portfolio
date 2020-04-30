<?php
/* if ($_SERVER['REQUEST_METHOD'] === 'POST'){ 
$nameVisitor = $_POST['name'];
$emailVisitor = $_POST['email'];
$subjectMailVisitor = $_POST['subject'];
$messageMailVisitor = $_POST['message'];

$email_from = 'samantha@samanthadbs.com';

	$email_subject = "Nouveau message";

	$email_body = "You have received a new message from the user $nameVisitor.\n".
                            "Here is the message:\n $messageMailVisitor" ;
                        

                            $to = "dbs.samantha@gmail.com";

                            $headers = "From: $email_from \r\n";
                          
                            $headers .= "Reply-To: $emailVisitor \r\n";
                          
                            mail($to,$email_subject,$email_body,$headers); */

// Securing the form against email injection :
   /*  function IsInjected($str)
    {
        $injections = array('(\n+)',
           '(\r+)',
           '(\t+)',
           '(%0A+)',
           '(%0D+)',
           '(%08+)',
           '(%09+)'
           );
               
        $inject = join('|', $injections);
        $inject = "/$inject/i";
    
        if(preg_match($inject,$str))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

if(IsInjected($emailVisitor))
    {
    echo "Bad email value!";
    exit;
    }
                        }

 */
?>