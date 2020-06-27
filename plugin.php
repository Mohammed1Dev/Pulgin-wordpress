<?php

/*
Plugin Name:contactForm
Plugin URI: https://github.com/Mohammed1Dev/Pulgin-wordpress.git
Description:Plugin that import a contact Form to your Contact page ...
Version:     1.0
Author:   Mohammed Amine Bettaoui
*/




require_once(ABSPATH . 'wp-config.php');
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysqli_select_db($connection, DB_NAME);


function newTableData()
{
    global $connection;

    $sql = "CREATE TABLE contactForm(id int NOT NULL PRIMARY KEY AUTO_INCREMENT, name varchar(255) NOT NULL, email varchar(255) NOT NULL, phone varchar(255) NOT NULL, message text NOT NULL)";
    $result = mysqli_query($connection, $sql);
    return $result;
}

if ($connection == true){
    newTableData();
}



add_action("admin_menu", "addMenu");
function addMenu()
{
  add_menu_page("Form_contact", "Form_contact", 4, "app-form", "contactform" );

}

// function mytheme_files() {
//     wp_enqueue_style('mytheme_main_style', get_stylesheet_uri());
//     wp_enqueue_style('mytheme_mobile_style', get_theme_file_uri('/css/contact.css'));
// }
//
// add_action('wp_enqueue_scripts', 'mytheme_files');

function contactform()
{
echo <<< 'EOD'
  <div id="box" style=" background: white;
                        border-radius: 5px;
                        max-width: 500px;
                        margin: 0 auto;
                        top: 6vh;
                        position: relative;
                        padding: 2% 5%;
                        min-width: 250px;
                        -webkit-box-shadow: 0px 0px 60px 0px rgba(0,0,0,0.42);
                        -moz-box-shadow: 0px 0px 60px 0px rgba(0,0,0,0.42);
                        box-shadow: 0px 0px 60px 0px rgba(0,0,0,0.42);
                        margin-bottom: 90px;">

  <h1 id="title" style="text-align: center;letter-spacing: 0.2em;">Contact us</h1>

    <p id="description" style="  text-align: center;color: grey;padding-left: 30px;padding-right: 30px;">Tell us a little about yourself and we will get back to you as soon as possible</p>

  <form id="survey-form" method="POST">

    <div class="container1"  style="padding-top: 10px;padding-bottom: 10px;padding-left: 20px;padding-right: 20px;">
      <label id="name-label" for="name " style="display: block;padding-bottom: 15px;">* Name: </label>
      <input type="text" name="name" id="name" class="input-field" style=" display: block;width: 100%;height:50px;border-top: none;border-left: none;border-right: none;" placeholder="Your name" required="">
    </div>

    <div class="container1"  style="padding-top: 10px;padding-bottom: 10px;padding-left: 20px;padding-right: 20px;">
      <label id="email-label" for="email" style="display: block;padding-bottom: 15px;">* E-mail</label>
      <input type="email" name="email" id="email" class="input-field" style=" display: block;width: 100%;height:50px;border-top: none;border-left: none;border-right: none;" placeholder="Your e-mail" required="">
    </div>

    <div class="container1"  style="padding-top: 10px;padding-bottom: 10px;padding-left: 20px;padding-right: 20px;">
      <label style="display: block;padding-bottom: 15px;">* Phone</label>
      <input type="text" name="phone" class="input-field" style=" display: block;width: 100%;height:50px;border-top: none;border-left: none;border-right: none;" placeholder="Your Phone" required="">
    </div>


    <div class="container1" style="padding-top: 10px;padding-bottom: 10px;padding-left: 20px;padding-right: 20px;">
      <label  style="display: block;padding-bottom: 15px;">Make a message</label>
        <textarea  class="input-field" style=" display: block;width: 100%;height:50px;border-top: none;border-left: none;border-right: none;" name="message" placeholder="Write your message here ...."></textarea>
    </div>

    <div class="container1"  style="padding-top: 10px;padding-bottom: 10px;padding-left: 20px;padding-right: 20px;" id="button-container1"><button id="submit" style=" height: 50px;width: 200px;border: none;background: rgb(161,104,199);background: linear-gradient(90deg, rgba(161,104,199,1) 0%, rgba(190,123,182,1) 100%);color: white;font-size: 1em;font-family: Montserrat;margin-top: 30px;border-radius: 5px;position: relative;" type="submit" name="save">Submit</button></div>

</form>
</div>

EOD;
}




    function contact($atts){
        extract(shortcode_atts(
            array(
                'name' => 'true',
                'email' => 'true',
                'phone' => 'true',
                'message' => 'true'

        ), $atts));

        if($name== "true"){
            $name1 = '<div class="container1"  style="padding-top: 10px;padding-bottom: 10px;padding-left: 20px;padding-right: 20px;">
              <label id="name-label" for="name " style="display: block;padding-bottom: 15px;">* Name: </label>
              <input type="text" name="name" id="name" class="input-field" style=" display: block;width: 100%;height:50px;border-top: none;border-left: none;border-right: none;" placeholder="Your name" required="">
            </div>';
        }else{
            $name1 = "";
        }

        if($email== "true"){
            $email1 = '<div class="container1"  style="padding-top: 10px;padding-bottom: 10px;padding-left: 20px;padding-right: 20px;">
              <label id="email-label" for="email" style="display: block;padding-bottom: 15px;">* E-mail</label>
              <input type="email" name="email" id="email" class="input-field" style=" display: block;width: 100%;height:50px;border-top: none;border-left: none;border-right: none;" placeholder="Your e-mail" required="">
            </div>';
        }else{
            $email1 = "";
        }

        if($phone== "true"){
            $phone1 = '  <div class="container1"  style="padding-top: 10px;padding-bottom: 10px;padding-left: 20px;padding-right: 20px;">
                <label style="display: block;padding-bottom: 15px;">* Phone</label>
                <input type="text" name="phone" class="input-field" style=" display: block;width: 100%;height:50px;border-top: none;border-left: none;border-right: none;" placeholder="Your Phone" required="">
              </div>';
        }else{
            $phone1 = "";
        }

         if($message== "true"){
            $message1 = '    <div class="container1" style="padding-top: 10px;padding-bottom: 10px;padding-left: 20px;padding-right: 20px;">
                  <label  style="display: block;padding-bottom: 15px;">Make a message</label>
                    <textarea  class="input-field" style=" display: block;width: 100%;height:50px;border-top: none;border-left: none;border-right: none;" name="message" placeholder="Write your message here ...."></textarea>
                </div>';
        }else{
            $message1 = "";
        }



        echo '<form method="POST"  >' .$name1 . $email1 . $phone1 . $message1 . '<br /><br />      <div class="container1"  style="padding-top: 10px;padding-bottom: 10px;padding-left: 20px;padding-right: 20px;" id="button-container1"><button id="submit" style=" height: 50px;width: 200px;border: none;background: rgb(161,104,199);background: linear-gradient(90deg, rgba(161,104,199,1) 0%, rgba(190,123,182,1) 100%);color: white;font-size: 1em;font-family: Montserrat;margin-top: 30px;border-radius: 5px;position: relative;" type="submit" name="save">Submit</button></div>


        </form><br />';
    }
    add_shortcode('Form_contact', 'contact');



    function form($name, $email, $phone, $message)
    {
        global $connection;

      $sql = "INSERT INTO contactForm(name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";
      $result = mysqli_query($connection , $sql);

      return $result;
    }

    if(isset($_POST['save'])){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];

        form($name, $email, $phone, $message);



    }



?>
