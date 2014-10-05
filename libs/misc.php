<?php

/*
* Project: CTRL-WebAdmin
* Author: Muris Pucic Trax <trax [AT] elektronika [DOT] ba>
* Version: 1.0
*/

function randomHex($length) {
    $alphabet = "0123456789abcdef";
    $pass = array(); // remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < $length; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); // turn the array into a string
}

//http://stackoverflow.com/questions/6101956/generating-a-random-password-in-php
function randomPassword($length) {
    $alphabet = "abcdefghijklmnpqrstuwxyzABCDEFGHJKLMNPQRSTUWXYZ123456789";
    $pass = array(); // remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < $length; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); // turn the array into a string
}

function sendMail($to_email, $subject, $message) {
	// Custom header
	$hh ="Reply-to: <nobody@ctrl.ba>\n";
	$hh.="From: <nobody@ctrl.ba>\n";
	$hh.="Return-path: <nobody@ctrl.ba>\n";
	$hh.="Message-ID: <".md5(uniqid(time()))."@"."ctrl.ba".">\n";
	$hh.="MIME-Version: 1.0\n";
	$hh.="Content-Type: text/plain; charset=UTF-8\n";
	$hh.="Content-transfer-encoding: 8bit\n";
	$hh.="Date: " . date('r', time()) . "\n";
	$hh.="X-Priority: 3\n";
	$hh.="X-MSMail-Priority: Normal\n";
	$hh.="X-Mailer: PHP\n";
	$hh.="X-MimeOLE: Produced By Trax from Elektronika.ba\n";

	// Send!
	return @mail($to_email, $subject, $message, $hh);
}

?>