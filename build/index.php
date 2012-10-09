<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>

<body>
    <?php
        // if the form has been submitted, process it - otherwise, just display the form normally
        if(isset($_POST['send'])){
            
            // pull the name out of the submitted for
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
    <div>
        <header>
            <h1>Sign up for Whoo!</h1>
            <h2>50 projects, 500 images, 10 videos, domain binding, and technical support</h2>
        </header>
        <div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="whoo_signup">
                <fieldset form="whoo_signup">
                    <legend>First, name your portfolio</legend>
                    <section>
                        <label for="port_title">Portfolio Title</label>
                        <input type="text" id="port_title" name="port_title" minlength="2"/>

                        <label for="port_address">Portfolio Address</label>
                        <input type="email" id="port_address" name="port_address" minlength="2"/>
                    </section>
                </fieldset>
                <fieldset form="whoo_signup">
                    <legend>Now, enter your account details</legend>
                    <section>
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" minlength="2"/>

                        <label for="port_title">Email</label>
                        <input type="text" id="email" name="email" minlength="2"/>
                        <aside>NOTE: We'll never share your email, promise.</aside>

                        <label for="port_title">Password</label>
                        <input type="text" id="password" name="password" minlength="2"/>
                    </section>
                </fieldset>
                <fieldset form="whoo_signup">
                    <legend>Finally, enter your payment information</legend>
                    <section>
                        <aside>Use PayPal</aside>
                        <label for="cc_number">Card Number</label>
                        <input type="text" id="cc_number" name="cc_number" minlength="2"/>
                        <div id="card_image"></div>
                        
                        <label for="sec_code">Security Code</label>
                        <input type="text" id="sec_code" name="sec_code" minlength="2"/>
                        <div id="sec_image"></div>

                        <label for="month">Expiration Date</label>
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
                    </section>
                </fieldset>
                <button type="submit" name="send">Create your portfolio</button>
            </form>
        </div>
        <?php
            }
        ?>
    </div>

</body>
</html>
