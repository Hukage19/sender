<?php

    session_start();
    include 'settings.php';
    include 'functions.php';

    if (isset($_POST['submit'])) {

        $provider = $_POST["provider"];
        $title = $_POST["title"];
        $message = $_POST["message"];

        if ($_POST["post_id"] == "") {
            $postId = "0";
        } else {
            $postId = $_POST["post_id"];
        }

        $link = $_POST['link'];
        $bigImage = $_POST["image"];
        $uniqueId = rand(1000, 9999);

        if ($provider == 'jrcpush') {
            ONESIGNAL($uniqueId,  $title, $message, $bigImage, $link, $postId, $oneSignalAppId, $oneSignalRestApiKey);
     
        }

    }

?>

<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>CustomVPN- Push Notification</title>

    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">
    <link href="assets/css/mdb.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    

</head>

<body class="poppins" id="background">

    <div>
        <div style="margin-top: 15px;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-md-8">
                        <form method="post" class="bg-white rounded-5 shadow-5-strong p-5">
                            

                            <?php if(isset($_SESSION['msg'])) { ?>
                            <div class="mb-3 alert alert-success" role="alert">
                                <?php echo $_SESSION['msg']; ?>
                            </div>
                            <?php unset($_SESSION['msg']); }?>

                            <div class="mb-2">
                                <select class="form-select" name="provider">
                                    
                                    <option value="jrcpush">Push Notification</option>
                                </select>
                            </div>

                            <div class="form-outline mb-2">
                                <input type="text" name="title" id="title" class="form-control" required/>
                                <label class="form-label" for="title">Title</label>
                            </div>

                            <div class="form-outline mb-2">
                                <textarea class="form-control" name="message" id="message" rows="2" required></textarea>
                                <label class="form-label" for="message">Message</label>
                            </div>

                            <div class="form-outline mb-2">
                                <input type="text" name="image" id="image" class="form-control" />
                                <label class="form-label" for="image">Big Image URL (Optional)</label>
                            </div>

                            <input type="hidden" name="post_id" id="post_id" value="0" class="form-control" />

                            <div class="form-outline mb-2">
                                <input type="text" name="link" id="link" class="form-control" />
                                <label class="form-label" for="link">Link (Optional)</label>
                            </div>

                            <div align="right">
                                <button type="submit" name="submit" class="btn btn-warning btn-lg btn-rounded">Send</button>
                            </div>
                            
                          
                         

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="assets/js/mdb.min.js"></script>

</body>

</html>
