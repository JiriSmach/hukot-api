<?php

$email = new \JiriSmach\HukotApi\Email('abcd');
try {
    print_r($email->listEmails());
} catch (\Exception $e) {
    echo $e->getMessage();
}
