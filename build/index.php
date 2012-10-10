<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sign up for Whoo!</title>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <link href='http://fonts.googleapis.com/css?family=Antic+Slab' rel='stylesheet' type='text/css'>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="assets/js/lib/jquery.validate.js"></script>
    <script src="assets/js/lib/modernizr.custom.13740.js"></script>
</head>

<body>
    <?php
        // if the form has been submitted, process it - otherwise, just display the form normally
        if(isset($_POST['send'])){
            
            // pull the name out of the submitted form
            $name = strip_tags($_POST['name']);
            
            // pull the email out of the submitted form
            $emailFrom = strip_tags($_POST['email']);
            
            // who you're sending the email to (probably change this)
            $emailTo = "tim.croteau@freshtilledsoil.com";
            $subject = "Submission";
            
            // inset information into the body of the email
            $body = "Name: ".$name."\n";
            $body .= "Email: ".$emailFrom."\n";
            
            // set the email headers
            $headers = "From: ".$emailFrom."\n";
            $headers .= "Reply-To:".$emailFrom."\n";    
            
            $success = mail($emailTo, $subject, $body, $headers);
            
            // this is the message that gets displayed after submission
            if ($success){
                echo 'sent';
            } else {
                echo 'not sent';
            }
        
        } else {
    ?>
    <div id="container">
        <header>
            <h1>Sign up for Whoo!</h1>
            <h2>50 projects, 500 images, 10 videos, domain binding, and technical support</h2>
        </header>
        <section>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="whoo_signup">
                <fieldset form="whoo_signup">
                    <legend id="one">First, name your portfolio</legend>
                    <div>
                        <label for="port_title">Portfolio title</label>
                        <input type="text" id="port_title" name="port_title" minlength="2"/>

                        <label for="port_address">Portfolio address</label>
                        <input type="text" id="port_address" name="port_address" minlength="2"/>
                    </div>
                </fieldset>
                <fieldset form="whoo_signup">
                    <legend id="two">Now, enter your account details</legend>
                    <div>
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" minlength="2"/>

                        <label for="port_title">Email</label>
                        <input type="text" id="email" name="email" minlength="2"/>
                        <label class="disclosure">NOTE: We'll never share your email, promise.</label>

                        <label for="port_title">Password</label>
                        <input type="text" id="password" name="password" minlength="2"/>
                    </div>
                </fieldset>
                <fieldset form="whoo_signup">
                    <legend id="three">Finally, enter your payment information</legend>
                    <div>
                        <label for="cc_number">Card number</label>
                        <input type="text" id="cc_number" name="cc_number" minlength="2"/>
                        <div id="card_image"></div>
                        
                        <label for="sec_code">Security code</label>
                        <input type="text" id="sec_code" name="sec_code" minlength="2"/>
                        <div id="sec_image"></div>

                        <label for="month">Expiration date</label>
                        <select id="month" name="month">
                            <option>January</option>
                            <option>February</option>
                            <option>March</option>
                            <option>April</option>
                            <option>May</option>
                            <option>June</option>
                            <option>July</option>
                            <option>August</option>
                            <option>September</option>
                            <option>October</option>
                            <option>November</option>
                            <option>December</option>
                        </select>
                        <select id="year" name="year">
                            <?php 
                                for ($i = date("Y");$i <= (date("Y") + 5);$i++) {  
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </fieldset>
                <button type="submit" name="send">Create your portfolio</button>
            </form>
        </section>
        <?php
            }
        ?>
    </div>

</body>
</html>
