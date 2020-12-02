<!-- Apartado 8.2 -->
<?php

class Utils {

    // Apartado 11.3
    function getToken($length = 32) {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet .= "0123456789";
        for ($i = 0; $i < $length; $i++) {
            $token .= $codeAlphabet[$this->crypto_rand_secure(0, strlen($codeAlphabet))];
        }
        return $token;
    }

    function crypto_rand_secure($min, $max) {
        $range = $max - $min;
        if ($range < 0)
            return $min; // not so random...
        $log = log($range, 2);
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd >= $range);
        return $min + $rnd;
    }

    //----- Fin apartado 11.3 ----
    // Apartado 11.7
    // send email using built in php mail function
    public function sendEmailViaPhpMail($send_to_email, $subject, $body) {

        $from_name = "Your Name";
        $from_email = "yourname@yourdomain.com";

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $headers .= "From: {$from_name} <{$from_email}> \n";

        if (mail($send_to_email, $subject, $body, $headers)) {
            return true;
        }

        return false;
    }

    //----- Fin apartado 11.7 -----
}
?>