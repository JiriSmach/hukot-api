<?php

$email = new \JiriSmach\HukotApi\Email('abcd');
try {
    $emailInterface = $email->deleteMailboxOrAlias('jiri.smach@mensa.cz');
} catch (\Exception $e) {
    echo $e->getMessage();
}

