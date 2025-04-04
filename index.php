<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="KoolReport is an intuitive and flexible Open Source PHP Reporting Framework for faster and easier data report delivery.">
    <meta name="author" content="KoolPHP Inc">
    <meta name="keywords" content="php reporting framework">
    <title>KoolReport Examples &amp; Demonstration</title>

    <link href="./assets/fontawesome/font-awesome.min.css" rel="stylesheet">
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/main.css" rel="stylesheet">

    <script type="text/javascript" src="./assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="./assets/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    .fa-plus-square-o,
    .fa-minus-square-o {
        cursor: pointer;
    }
</style>
<script>
    function toggleExpandCollapse(i) {
        i.classList.toggle('fa-plus-square-o');
        i.classList.toggle('fa-minus-square-o');
    }
</script>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a id="baseUrl" class="navbar-brand" href=".">KoolReport Examples</a>
        <ul id="topMenu" class="navbar-nav mr-auto">

        </ul>
        <div class="my-2 my-lg-0">
            <a href="https://www.koolreport.com/get-koolreport-pro" class="btn-get-koolreort-pro btn btn-outline-success my-2 my-sm-0">Get KoolReport Pro</a>
        </div>
    </nav>
    <main class="container">
        <?php
        $root_url = ".";
        $reportJson = <<<EOD
            {
                "Core": {
                    "<i class='fa fa-database'></i>DataSources": {
                        "Variables_based": {
                            "Array": "/reports/datasources/array_report/",
                            "Report": "/reports/datasources/report_datasource/"
                        },
                        "Files": {
                            "CSV": "/reports/datasources/csv_report/",
                            "Excel": "/reports/datasources/excel_report/",
                            "Big CSV": "/reports/datasources/big_csv/",
                            "Big Excel": "/reports/datasources/big_excel/"
                        },
                        "PDO": {
                            "MySQL": "/reports/datasources/pdo_mysql/",
                            "PostgreSQL": "/reports/datasources/pdo_postgresql/",
                            "SQLServer": "/reports/datasources/pdo_sqlserver/",
                            "Oracle": "/reports/datasources/pdo_oracle/"
                        },
                        "Native_databases": {
                            "MySQL": "/reports/datasources/mysql_report/",
                            "PostgreSQL": "/reports/datasources/postgresql_report/",
                            "SQLServer": "/reports/datasources/sqlserver_report/",
                            "Oracle": "/reports/datasources/oracle_report/",
                            "MongoDB": "/reports/datasources/mongodb_report/"
                        }
                    }
                }
            }        
        EOD;
        // $menu = json_decode(file_get_contents("./reports.json"),true);
        $menu = json_decode($reportJson, true);
        foreach($menu as $section_name=>$section)
        {
        ?>
            <h4 class="section-header"><?php echo $section_name; ?></h4>
            <div class="row">
                <?php
                foreach($section as $group_name=>$group)
                {
                ?>
                    <div class="col-md-3 example-group col-sm-6">
                        <h5>
                        <?php echo (strpos($group_name,"</i>")>0)?$group_name:"<i class='icon-layers'></i>$group_name"; ?></h5>
                        <ul class="list-unstyled">
                        <?php
                        // echo "group: "; print_r($group);
                        foreach($group as $sname=>$surl)
                        {
                            if(is_string($surl))
                            {
                            ?>
                                <li><a href="<?php echo $root_url.$surl; ?>"><?php echo $sname; ?></a></li>
                            <?php
                            }
                            else
                            {
                                $idName = $sname;
                                $idName = str_replace(" ", "", $idName);
                                $idName = str_replace("/", "", $idName);
                                $idName = str_replace("&", "", $idName);
                            ?>
                                <li>
                                <strong><i class='fa fa-minus-square-o' data-toggle="collapse" data-target="#<?php echo $idName; ?>" onclick="toggleExpandCollapse(this);"></i> <?php echo $sname; ?></strong>
                                    <ul class="list-unstyled collapse show" id="<?php echo $idName; ?>">
                                    <?php
                                    foreach($surl as $tname=>$turl)
                                    {
                                    ?>
                                        <li><a href="<?php echo $root_url.$turl; ?>"><?php echo $tname; ?></a></li>
                                    <?php    
                                    }
                                    ?>
                                    </ul>
                                </li>
                            <?php
                            }
                        }
                        ?>
                        </ul>                    
                    </div>
                <?php    
                }
                ?>
            </div>
        <?php    
        }
        ?>
    </main>
</body>
</html>