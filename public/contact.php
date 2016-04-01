<? include("php/send.php"); ?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>UCSB Pi Alpha Phi - Contact</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="stylesheet" type="text/css" href="css/form.css" />

</head>

<body>

    <div class="container">
        <div class="mainWrapper">
            <div class="spacerDiv"></div>
            <!-- topDiv -->
            <div id="topDiv">
                <img id="links" src="img/links.png" />
                <p id="letters">&Pi;&Alpha;&Phi;</p>
                <p id="university">University of California,<br>Santa Barbara</p>
                <hr />
                <p id="est">EST. 2006</p>
            </div>
            <!-- menuDiv -->
            <div id="menuDiv">
                <ul>
                    <li><a href="..">Home</a></li>
                    <li><a href="about">About</a></li>
                    <li><a href="officers">Officers</a></li>
                    <li><a href="rush">Rush</a></li>
                    <li><a href="contact">Contact</a></li>
                </ul>
            </div>
            <!-- mobileMenuDiv -->
            <div id="mobileMenuDiv">
                <ul>
                    <li><a href="..">Home</a></li>
                    <li><a href="about">About</a></li>
                    <li><a href="officers">Officers</a></li>
                </ul>
                <br />
                <ul>
                    <li><a href="rush">Rush</a></li>
                    <li><a href="contact">Contact</a></li>
                </ul>
            </div>
            <!-- content -->
            <div class="titleDiv">
                <h1>Contact</h1>
            </div>

            <hr />

            <div id="formDiv">
                <p id="contactMessage">Questions, Comments, Concerns?</p>

                <?php echo $result ?>

                <form method="post">
                    <ul class="form-style-1">
                        <li>
                            <label>Name <span class="required">*</span></label>
                            <input type="text" name="name" class="field-long" value="<?php echo $_POST['name']; ?>"/>
                        </li>
                        <li>
                            <label>Email <span class="required">*</span></label>
                            <input type="email" name="email" class="field-long" value="<?php echo $_POST['email']; ?>" />
                        </li>
                        <li>
                            <label>Subject</label>
                            <input type="text" name="subject" class="field-long" value="<?php echo $_POST['subject']; ?>" />
                        </li>
                        <li>
                            <label>Your Message <span class="required">*</span></label>
                            <textarea name="message" id="field5" class="field-long field-textarea"><?php echo $_POST['message']; ?></textarea>
                        </li>
                        <li>
                            <input type="submit" name="submit" value="Send" />
                        </li>
                    </ul>
                </form>
            </div>
            <div class="push"></div>
        </div>
        <!-- footer -->
        <div class="footer">
            <hr />
            <p class="footerText footerLeft">Pi Alpha Phi Fraternity, Inc.</p>
            <p class="footerText footerRight">Omicron Chapter</p>
            <p class="footerText footerCenter">&copy; 2016 UCSB Pi Alpha Phi</p>
        </div>
    </div>

    <script type="text/javascript" src="js/windowsize.js"></script>

</body>

</html>
