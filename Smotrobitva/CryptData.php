<?php
session_start();
require 'dbcon.php';

if(isset($_POST['CryptStatus']))
{     
        if ($_POST['CryptStatus'] == 'EnCryptData')
        {

                //$key = "SECURITYSECURITY";
                $key = $_POST['Key'];  
                $keyLength = strlen($key);
                $keyIndex = 0;
                
                //$message = str_split("WE NEED MORE SNOW");
                $message = str_split($_POST['Message']);
                //$message = preg_replace('/\s+/', '', $message);

                $output = '';

                foreach($message as $value)
                {
                $thisValueASCII = ord($value);

                /*if ($thisValueASCII == 32) //пробел
                {
                        $key_index_corrected = $keyIndex % $keyLength;
                        $output = $output . $key[$key_index_corrected];
                        $keyIndex++;
                        continue;
                }*/

                if($thisValueASCII >= 65 && $thisValueASCII <= 90) // A-Z
                {
                        $thisValueASCIIOffset = 65;
                } else // a-z
                {
                        $thisValueASCIIOffset = 97;
                }

                $letter_value_corrected = $thisValueASCII - $thisValueASCIIOffset;
                $key_index_corrected = $keyIndex % $keyLength;

                $key_ascii_value = ord($key[$key_index_corrected]);

                if($key_ascii_value >= 65 && $key_ascii_value <= 90) // A-Z
                {
                        $key_offset = 65;
                } else // a-z
                {
                        $key_offset = 97;
                }

                $final_key = $key_ascii_value - $key_offset;

                $letter_value_encrypted = ($letter_value_corrected + $final_key)%26;

                $output = $output . chr($letter_value_encrypted + $thisValueASCIIOffset);
                $keyIndex++;
                }

                ?>
                <h1>
                <p class="text-center fs-3"><strong><?=$output?></strong></p>    
                </h1>
                

                <?php
        }

        if ($_POST['CryptStatus'] == 'DeCryptData')
        {
                //$key = "SECURITYSECURITY";
                $key = $_POST['Key'];
                $keyLength = strlen($key);
                $keyIndex = 0;

                //$message = str_split("OIVHVMWRESTYKAGMO");
                $message = str_split($_POST['Message']);
                //$message = preg_replace('/\s+/', '', $message);

                $output = '';

                foreach($message as $value)
                {
                $thisValueASCII = ord($value);

                if($thisValueASCII >= 65 && $thisValueASCII <= 90) // A-Z
                {
                        $thisValueASCIIOffset = 65;
                } else // a-z
                {
                        $thisValueASCIIOffset = 97;
                }

                $letter_value_corrected = $thisValueASCII - $thisValueASCIIOffset;
                $key_index_corrected = $keyIndex % $keyLength;

                $key_ascii_value = ord($key[$key_index_corrected]);

                if($key_ascii_value >= 65 && $key_ascii_value <= 90) // A-Z
                {
                        $key_offset = 65;
                } else // a-z
                {
                        $key_offset = 97;
                }

                $final_key = $key_ascii_value - $key_offset;

                $letter_value_pure = $letter_value_corrected - $final_key;
                if ($letter_value_pure < 0) $letter_value_pure += 26;

                $letter_value_encrypted = $letter_value_pure%26;

                $output = $output . chr($letter_value_encrypted + $thisValueASCIIOffset);
                $keyIndex++;
                }

                ?>
                <h1>
                <p class="text-center fs-3"><strong><?=$output?></strong></p>    
                </h1>
                

                <?php
        }
}

?>