<?php

$email = new \JiriSmach\HukotApi\Email('abcd');
try {
    print_r($email->listEmails());
} catch (\Throwable $e) {
    echo $e->getMessage();
}
