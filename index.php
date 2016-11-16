<?php
/**
 * @description Create XML feeds from a PHP Array
 *
 * @author Adnan Sabanovic <adnanxteam@gmail.com>
 * 
 */


include 'XML_Main.php';
include 'XML_Feed.php';
include 'Sample_One.php';
include 'Sample_Two.php';

echo "<h1>Printing XML One</h1>";
new Sample_One('sample-one');

echo "<h1>Printing XML Two</h1>";
new Sample_Two('sample-two');