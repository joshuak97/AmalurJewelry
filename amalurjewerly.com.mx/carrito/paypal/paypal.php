<?php
define('ProPayPal', 0);
if(ProPayPal){
define("PayPalClientId", "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX");
    define("PayPalSecret", "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX");    define("PayPalBaseUrl", "https://api.paypal.com/v1/");
    define("PayPalENV", "production");
} else {
    define("PayPalClientId", "AYk5PQAmb0RQyPZ6CvjUrTJHKBBMiUmX2gRFm_RwUFtsoKYbICw22qQ2HuV4Vy2TuCmxIewCKSTnqcrh");
    define("PayPalSecret", "EB1diF6qU6KuHtmdu8wp_ASCYXRcF3QVXWKbG8myxFP3GcfwphdFpzV_xy0nmuhvHy6KuBuyiMTBTkKN");
    define("PayPalBaseUrl", "https://api.sandbox.paypal.com/v1/");
    define("PayPalENV", "sandbox");
}
?>
