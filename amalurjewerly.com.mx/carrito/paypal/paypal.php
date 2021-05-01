<?php
define('ProPayPal', 0);
if(ProPayPal){
    define("PayPalClientId", "ASUIXToQxRGY2dYC-LkcGAvMJtRjb_mQ3RlqK7xhh2uMdT0xaRUgzHgmQNh0_tA-DdWCT1KeneFvPoI8");
    define("PayPalSecret", "EK4xs6VpSNhwIVZUAlIpdbtNx_9hqPoDqhWTvPeTS0y2M0eYWTzNwEzm9H5xmXYvMZaZJMJomS9qALWj");
    define("PayPalBaseUrl", "https://api.paypal.com/v1/");
    define("PayPalENV", "production");
} else {
    define("PayPalClientId", "AYk5PQAmb0RQyPZ6CvjUrTJHKBBMiUmX2gRFm_RwUFtsoKYbICw22qQ2HuV4Vy2TuCmxIewCKSTnqcrh");
    define("PayPalSecret", "EB1diF6qU6KuHtmdu8wp_ASCYXRcF3QVXWKbG8myxFP3GcfwphdFpzV_xy0nmuhvHy6KuBuyiMTBTkKN");
    define("PayPalBaseUrl", "https://api.sandbox.paypal.com/v1/");
    define("PayPalENV", "sandbox");
}
?>