<?php

/**
 * If you install koolreport with composer, you only need to
 * require the composer autoload file
 * 
 * require_once dirname(__FILE__)."/vendor/autoload.php";
 */

require_once dirname(__FILE__)."/../koolreport/core/autoload.php";

function getRootUrl()
{
    $document_root = $_SERVER["DOCUMENT_ROOT"];
    $script_name = dirname($_SERVER["SCRIPT_NAME"]);
    $root_url = $script_name;
    while(!is_file($document_root.$root_url."/reports.json"))
    {
        $root_url = dirname($root_url);
    }
    return $root_url;
}

$root_url = getRootUrl();
?>
<link href="<?php echo $root_url; ?>/assets/css/bootstrap.min.css" rel="stylesheet">;
