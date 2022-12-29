<?php

$email = new \JiriSmach\HukotApi\Email('abcd');
try {
    $emailInterface = $email->getInfoAboutEmail('jiri.smach@mensa.cz');
    print_r($emailInterface->getForwarding());
} catch (\Exception $e) {
    echo $e->getMessage();
}