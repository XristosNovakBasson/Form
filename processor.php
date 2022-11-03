<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processor</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .n{
            background: #000;
            padding: 0.4rem;
            border-radius: 10px;
            margin: 0.2rem;
            display: inline-block;
        }
    </style>
</head>
<body>
    


    <?php
        
        $message = "hello";
        $preferences = [];
        $preferenceMessage= "";
        
        $firstName = "";
        $lastName = "";
        $email = "";
        $unsub = "";
        $suspend = "";
        $del = "";
        $errors = [];
        
        
        if(isset($_POST['submit'])){
            
        
            #VALIDATING FIRST NAME
            if(isset($_POST['fname'])){
                $firstName = stripString($_POST['fname']);
                if(validateFirstName($firstName)){
                    $firstName = $firstName;
                    $everythingValid = true;
                }else{
                    $firstName = "First name is not valid."; 
                } 
            }
            
            #VALIDATING LAST NAME
            if(isset($_POST['lname'])){
                $lastName = stripString($_POST['lname']);
                if(validateLastName($lastName)){
                    $lastName = $lastName; 
                }else{
                    $lastName = "Last name is not valid."; 
                } 
            }
            
            #VALIDATING EMAIL
            if(isset($_POST['email'])){
                $email = stripString($_POST['email']);
                if(validateEmail($email)){
                    $email = $email; 
                }else{
                    $email = "Email is not valid."; 
                } 
            }
            
          
            
            #IF ALL FIELDS ARE VALID AND A CHOICE HAS BEEN MADE THEN 
            #SHOW FORM SUBMISSION WAS SUCCESSFULL
            if(validateFirstName(stripString($_POST['fname'])) &&
                    validateLastName(stripString($_POST['lname'])) &&
                    validateEmail(stripString($_POST['email']))){
                $message = "form has been submitted!";
                
                #DOES USER WANT TO UNSUB?
                if(isset($_POST['unsub'])){
                    $unsub = stripString($_POST['unsub']);
                    if($unsub==="yes"){
                       $preferences[] = "you will be unsubscribed.";
                    }
                }

                #DOES USER WANT TO SUSPEND?
                if(isset($_POST['suspend'])){
                    $suspend = stripString($_POST['suspend']);
                    if($suspend==="yes"){
                        $preferences[] = "email will be suspended for 90 days.";
                    }
                }

                #DOES USER WANT TO DEL ALL INFO?
                if(isset($_POST['del'])){
                    $del = stripString($_POST['del']);
                    if($del==="yes"){
                        $preferences[] = "your info will be deleted soon.";
                    }
                }
                
            }else{
                 $message = "form submission was unsuccessful!";
                
            } 
         
        
        }
                
          
           function validateFirstName($fname){
               if($fname==="" || strlen($fname)<2){
                  return false;
               }else{
                  return true;
               }
           }
           
           function validateLastName($lname){
               if($lname==="" || strlen($lname)<2 ){
                   return false;
               }else{
                   return true;
               }
           }
           
           function validateEmail($email){
               if($email==="" || strlen($email)<2){
                   return false;
               }else if(!((strpos($email, ".")>0) 
                       && strpos($email, "@")>0) || 
               preg_match("/[^a-zA-Z0-9.@_-]/", $email)){
                   return false;
               }else{
                   return true;
               }
           }
           
           function stripString($string){
               $string = stripslashes($string);
               $string = htmlentities($string);
               return $string;
           }
    ?>

    <div class="messageBox">
        <p class="message">Hi, <span class="n"><?=$firstName?></span>the 
            <?=$message;?> your email is <span class="n"><?=$email?></span></p>
        <div>
            <?php
               
             foreach ($preferences as $p){
               echo "<p class='msg'>". $p."</p>";
            }
        
        ?></div>
    </div>


</body>
</html>