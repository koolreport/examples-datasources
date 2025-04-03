<?php

use \koolreport\KoolReport;
use \koolreport\processes\TimeBucket;
use \koolreport\processes\Group;

class SakilaRental extends KoolReport
{
    public function settings()
    {
        return array(
            "dataSources"=>array(
                "sakila_rental"=>array(
                    'host' => 'localhost',
                    'username' => 'root',
                    'password' => '',
                    'dbname' => 'sakila',
                    'class' => '\koolreport\datasources\PostgreSQLDataSource'
                ),
            )
        );
    }   
    protected function setup()
    {
        $this->src('sakila_rental')
        ->query("SELECT payment_date,amount FROM payment")
        ->pipe(new TimeBucket(array(
            "payment_date"=>"month"
        )))
        ->pipe(new Group(array(
            "by"=>"payment_date",
            "sum"=>"amount"
        )))
        ->pipe($this->dataStore('sale_by_month'));
    } 
}