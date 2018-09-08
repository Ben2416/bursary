<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard</title>
<link rel="stylesheet" href="css/style.default.css" type="text/css">
<link rel="stylesheet" href="prettify/prettify.css" type="text/css">
<script type="text/javascript" src="prettify/prettify.js"></script>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="js/jquery.flot.min.js"></script>
<script type="text/javascript" src="js/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
<script type='text/javascript'>
jQuery(document).ready(function(){
setInterval(function(){	
	jQuery("#tr").load("php/registered.php?p=tr").slideUp( 300 ).fadeIn( 600 );
	jQuery("#tc").load("php/registered.php?p=tc").slideUp( 600 ).fadeIn( 700 );
	jQuery("#ti").load("php/registered.php?p=ti").slideUp( 900 ).fadeIn( 800 );
	},5000);
});
</script>
</head>

<body>

<div class="mainwrapper" style="min-height: 878px; background-position: 0px 0px;">
    
    <!-- START OF LEFT PANEL -->
    <div class="leftpanel" style="margin-left: 0px;">
        
        <div class="logopanel animate0 fadeInUp">
            <h1><a href="dashboard.php">BSSB <span>Admin Area</span></a></h1>
        </div><!--logopanel-->
        
        <div class="datewidget animate1 fadeInUp">Today is Tuesday, Dec 25, 2012 5:30pm</div>
    
        <!--searchwidget-->
        
        <!--plainwidget-->
        
        <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
                <li class="nav-header animate4 fadeInUp">Main Navigation</li>
                <li class="active animate5 fadeInUp"><a href="dashboard.php"><span class="icon-align-justify animate0 swing"></span> Dashboard</a></li>
                <li class="animate6 fadeInUp"><a href="users.php"><span class="icon-picture"></span> Registered Users</a></li>
                <li class="animate9 fadeInUp"><a href="application.php"><span class="icon-font"></span> Submitted Application</a></li>
                <li class="animate10 fadeInUp"><a href="report.php"><span class="icon-signal"></span> Generate Report</a></li>
            </ul>
        </div><!--leftmenu-->
        
    </div><!--mainleft-->
    <!-- END OF LEFT PANEL -->
    
    <!-- START OF RIGHT PANEL -->
    <div class="rightpanel" style="margin-left: 260px;">
        <div class="headerpanel animate1 fadeInUp">
            <a href="#" class="showmenu clicked"></a>
            
            <div class="headerright">
                <div class="dropdown notification">
                    
                </div><!--dropdown-->
                
                <div class="dropdown userinfo">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#">Hi, Admin <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="editprofile.php"><span class="icon-edit"></span> Edit Profile</a></li>
                       <!--  <li><a href="#"><span class="icon-wrench"></span> Account Settings</a></li> -->
                        <li class="divider"></li>
                        <li><a href="#"><span class="icon-off"></span> Sign Out</a></li>
                    </ul>
                </div><!--dropdown-->
            
            </div><!--headerright-->
            
        </div><!--headerpanel-->
        <div class="breadcrumbwidget animate2 fadeInUp">
            <!--skins-->
            <ul class="breadcrumb">
                <li><a href="dashboard.php">Home</a> <span class="divider">/</span></li>
                <li class="active">Dashboard</li>
            </ul>
        </div><!--breadcrumbs-->
      <div class="pagetitle animate3 fadeInUp">
            <h1>Dashboard</h1>
        </div><!--pagetitle-->
        
        <div class="maincontent animate4 fadeInUp">
            <div class="contentinner content-dashboard">
                <!--alert-->
                
                <div class="row-fluid">
                    <div class="span11">
                        <ul class="widgeticons row-fluid">
                            <li class="one_half"><a href="#"><img src="img/users.png" alt="" class=""><span id='tr'>Total: </span></a></li>
                            <li class="one_half"><a href="#"><img src="img/application.png" alt="" class=""><span id='tc'>Total: </span></a></li>
							<li class="one_half"><a href="#"><img src="img/incomplete.png" alt="" class=""><span id='ti'>Total: </span></a></li>
                        </ul>
                        
                        
                        
                        
                        
                        
                        
                        <!--widgetcontent-->
                        
                        
                    </div><!--span8-->
                    <!--span4-->
                </div><!--row-fluid-->
            </div><!--contentinner-->
        </div><!--maincontent-->
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
    
    <div class="clearfix"></div>
    
    <div class="footer">
        <div class="footerleft" style="display: block;">Bayelsa State Scholarship Board</div>
        <div class="footerright" style="margin-left: 260px;"> <a href="#">BSSB</a> - <a href="#"></a></div>
    </div><!--footer-->    
</div><!--mainwrapper-->
</body>
</html>