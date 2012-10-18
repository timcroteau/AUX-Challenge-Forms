<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <title>Sign up for Whoo!</title>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <script src="assets/js/lib/modernizr.custom.03443.js"></script>
</head>

<body>
    
    <div id="container">
        <header role="banner">
            <hgroup>
                <h1>Sign up for Whoo!</h1>
                <h2>50 projects, 500 images, 10 videos, domain binding, and technical support</h2>
            </hgroup>
        </header>
        <section>
        <?php
        // if the form has been submitted, process it - otherwise, just display the form normally
        if(isset($_POST['send'])){
            
            // pull submitted info out of the form
            $port_title = strip_tags($_POST['port_title']);            
            $port_address = strip_tags($_POST['port_address']);
            $name = strip_tags($_POST['name']);
            $emailFrom = strip_tags($_POST['email']);
            
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
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="whoo_signup">
                <fieldset form="whoo_signup">
                    <legend id="one">First, name your portfolio</legend>
                    <div>
                        <label for="port_title">Portfolio title</label>
                        <input type="text" id="port_title" name="port_title" pattern="^[\w\d\_\- ]{3,}" title="Must be at least 3 characters, and may include letters, numbers, underscores and hyphens" required/>

                        <label for="port_address">Portfolio address</label>
                        <input type="text" id="port_address" name="port_address" pattern="^[\w\d\_\-]{3,}" title="Must be at least 3 characters, and may include letters, numbers, underscores and hyphens" required/>
                    </div>
                </fieldset>
                <fieldset form="whoo_signup">
                    <legend id="two">Now, enter your account details</legend>
                    <div>
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" pattern="^[\w\d\'\- ]{3,}$" title="Must include at least 2 characters" required/>

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required/>
                        <label class="disclosure">NOTE: We'll never share your email, promise.</label>

                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must be at least eight characters long, including at least one number, one lowercase, and one uppercase letter" type="text" required/>
                    </div>
                </fieldset>
                <fieldset form="whoo_signup">
                    <legend id="three">Finally, enter your payment information</legend>
                    <div>
                        <label for="cc_number">Card number</label>
                        <input type="text" id="cc_number" name="cc_number" pattern="[0-9]{13,16}" title="Must be between 13 and 16 characters" required/>
                        <div id="card_image">
                            <input type="radio" id="amex" name="card_type" value="amex" class="visuallyhidden" /><label for="amex"><span>American Express</span></label>
                            <input type="radio" id="visa" name="card_type" value="visa" class="visuallyhidden" /><label for="visa"><span>Visa</span></label>
                            <input type="radio" id="discover" name="card_type" value="discover" class="visuallyhidden" /><label for="discover"><span>Discover</span></label>
                            <input type="radio" id="mastercard" name="card_type" value="mastercard" class="visuallyhidden" /><label for="mastercard"><span>Mastercard</span></label>
                        </div>
                        
                        <label for="sec_code">Security code</label>
                        <input type="text" id="sec_code" name="sec_code" required/>
                        <div id="sec_image"></div>

                        <label for="month">Expiration date</label>
                        <select id="month" name="month" required>
                            <option value="" disabled selected>Month...</option>
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
                            <option value="" disabled selected>Year...</option>
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
        
        <?php
            }
        ?>
        </section>
    </div>
    <script src="assets/js/script.js"></script>
</body>
</html>
