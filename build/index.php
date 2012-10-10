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
            
            // pull submitted info out of the form
            $port_title = strip_tags($_POST['port_title']);            
            
            $port_address = strip_tags($_POST['port_address']);
            $name = strip_tags($_POST['name']);
            $emailFrom = strip_tags($_POST['email']);
            $password = strip_tags($_POST['password']);
            $cc_number = strip_tags($_POST['cc_number']);
            $sec_code = strip_tags($_POST['sec_code']);
            $month = strip_tags($_POST['month']);
            $year = strip_tags($_POST['year']);
            
            // who you're sending the email to (probably change this)
            $emailTo = "tim.croteau@freshtilledsoil.com";
            $subject = "Whoo! Signup Form Submission";
            
            // inset information into the body of the email
            $body = "Name: ".$name."\n";
            $body .= "Email: ".$emailFrom."\n";
            $body .= "Portfolio Title: ".$port_title."\n";
            $body .= "Portfolio Address: ".$port_address.".sample.com\n";
            
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
                        <input type="text" id="port_title" name="port_title" minlength="2" autofocus="autofocus" required/>

                        <label for="port_address">Portfolio address</label>
                        <input type="text" id="port_address" name="port_address" minlength="2" required/>
                    </div>
                </fieldset>
                <fieldset form="whoo_signup">
                    <legend id="two">Now, enter your account details</legend>
                    <div>
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" minlength="2" required/>

                        <label for="port_title">Email</label>
                        <input type="email" id="email" name="email" minlength="2" required/>
                        <label class="disclosure">NOTE: We'll never share your email, promise.</label>

                        <label for="port_title">Password</label>
                        <input type="text" id="password" name="password" minlength="2" required/>
                    </div>
                </fieldset>
                <fieldset form="whoo_signup">
                    <legend id="three">Finally, enter your payment information</legend>
                    <div>
                        <label for="cc_number">Card number</label>
                        <input type="text" id="cc_number" name="cc_number" minlength="2" required/>
                        <div id="card_image"></div>
                        
                        <label for="sec_code">Security code</label>
                        <input type="text" id="sec_code" name="sec_code" minlength="2" required/>
                        <div id="sec_image"></div>

                        <label for="month">Expiration date</label>
                        <select id="month" name="month" required>
                            <option value="">---</option>
                            <option value="Jan">January</option>
                            <option value="Feb">February</option>
                            <option value="Mar">March</option>
                            <option value="Apr">April</option>
                            <option value="May">May</option>
                            <option value="Jun">June</option>
                            <option value="Jul">July</option>
                            <option value="Aug">August</option>
                            <option Value="Sep">September</option>
                            <option value="Oct">October</option>
                            <option value="Nov">November</option>
                            <option value="Dec">December</option>
                        </select>
                        <select id="year" name="year" required>
                            <option value="">---</option>
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
