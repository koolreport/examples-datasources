<?php
$menu = json_decode(file_get_contents("./reports.json"),true);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="KoolReport is an intuitive and flexible Open Source PHP Reporting Framework for faster and easier data report delivery.">
    <meta name="author" content="KoolPHP Inc">
    <meta name="keywords" content="php reporting framework">
    <!-- <link rel="shortcut icon" href="./assets/images/bar.png"> -->
    <title>KoolReport Examples &amp; Demonstration</title>

    <link href="./assets/fontawesome/font-awesome.min.css" rel="stylesheet">
    <!-- <link href="./assets/simpleline/simple-line-icons.min.css" rel="stylesheet"> -->
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
        // console.log('toggleExpandCollapse: ', i);
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
        <!-- <h1 class="mt-5">Examples &amp; Demonstration</h1>
        <p class="lead">
            This demo contains series of examples to guide the usage of KoolReport and its extended packages.
            KoolReport is an intuitive and flexible Open-Source PHP Reporting Framework for faster and easier report delivery. It gives you full control of data process as well as data visualization. It is fast, simple and can be extended in many ways.
        </p>
        <p>
            <i><b>Note:</b> If an example in this demonstration does not work, the reason is that it
            requires either database or extended packages to be installed. You may find all sample databases
            in <code>examples/databases</code> folder, please import them to your database system and change
            connection at <code>config.php</code>.
            If missing package is the issue, you can get them <a href="https://www.koolreport.com/packages">here</a>.
            </i>
        </p> -->
        <?php
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
                        <!-- <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> -->
                        <?php echo (strpos($group_name,"</i>")>0)?$group_name:"<i class='icon-layers'></i>$group_name"; ?></h5>
                        <ul class="list-unstyled">
                        <?php
                        // echo "group: "; print_r($group);
                        foreach($group as $sname=>$surl)
                        {
                            if(is_string($surl))
                            {
                            ?>
                                <!-- <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> -->
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
                                <!-- <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> -->
                                <strong><i class='fa fa-minus-square-o' data-toggle="collapse" data-target="#<?php echo $idName; ?>" onclick="toggleExpandCollapse(this);"></i> <?php echo $sname; ?></strong>
                                    <ul class="list-unstyled collapse show" id="<?php echo $idName; ?>">
                                    <?php
                                    foreach($surl as $tname=>$turl)
                                    {
                                    ?>
                                        <!-- <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> -->
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