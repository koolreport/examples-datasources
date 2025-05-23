<?php 
    use \koolreport\widgets\koolphp\Table;
    use \koolreport\widgets\google\BarChart;
?>
<div class="container report-content">
    <div class="text-center">
        <h1>SQL Server</h1>
        <p class="lead">This report show how to build report from MySQL data</p>
    </div>

    <?php
    BarChart::create(array(
        "dataStore"=>$this->dataStore('sale_by_month'),  
        "columns"=>array(
            "payment_date"=>array(
                "label"=>"Month",
                "type"=>"datetime",
                "format"=>"Y-n",
                "displayFormat"=>"F, Y",
            ),
            "amount"=>array(
                "label"=>"Amount",
                "type"=>"number",
                "prefix"=>"$",
            )
        ),
        "width"=>"100%",
    ));
    ?>
</div>