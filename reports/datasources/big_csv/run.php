<?php
echo '<link href="../../../assets/theme/css/bootstrap.min.css" rel="stylesheet">';
require_once "../../../../koolreport/core/autoload.php";

require_once "SakilaRental.php";
$report = new SakilaRental;
$report->run()->render();
