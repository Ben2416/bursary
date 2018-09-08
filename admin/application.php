<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Admin Dashboard</title>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />
<link rel="stylesheet" href="prettify/prettify.css" type="text/css" />
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="prettify/prettify.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
</head>

<body>

<div class="mainwrapper">
	
    <!-- START OF LEFT PANEL -->
    <div class="leftpanel">
    	
        <div class="logopanel">
        	<h1><a href="dashboard.php">BSSB <span>Admin Area</span></a></h1>
        </div><!--logopanel-->
        
        <div class="datewidget">Today is Tuesday, Dec 25, 2012 5:30pm</div>
            
         <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
                <li class="nav-header animate4 fadeInUp">Main Navigation</li>
                <li class="animate5 fadeInUp"><a href="dashboard.php"><span class="icon-align-justify animate0 swing"></span> Dashboard</a></li>
                <li class="animate6 fadeInUp"><a href="users.php"><span class="icon-picture"></span> Registered Users</a></li>
                <li class="active animate9 fadeInUp"><a href="application.php"><span class="icon-font"></span> Submitted Application</a></li>
                <li class="animate10 fadeInUp"><a href="report.php"><span class="icon-signal"></span> Generate Report</a></li>
            </ul>
        </div><!--leftmenu-->
        
    </div><!--mainleft-->
    <!-- END OF LEFT PANEL -->
    
    <!-- START OF RIGHT PANEL -->
    <div class="rightpanel">
    	<div class="headerpanel">
        	<a href="#" class="showmenu"></a>
            
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
        <div class="breadcrumbwidget">
        	<ul class="breadcrumb">
                <li><a href="dashboard.php">Home</a> <span class="divider">/</span></li>
                <li><a href="users.php">Users</a> <span class="divider">/</span></li>
            </ul>
        </div><!--breadcrumbs-->
        <div class="pagetitle">
        	<h1>Submitted Application</h1> <span>List of all submitted applicants</span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
        	<div class="contentinner">
            
            	<table class="table table-bordered" id="dyntable">
                    <colgroup>
                        <col class="con0" style="align: center; width: 4%" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                    </colgroup>
                    <thead>
                        <tr>
                          	<th class="head0 nosort"><input type="checkbox" class="checkall" /></th>
                            <th class="head0">Full Name</th>
                            <th class="head1">University</th>
                            <th class="head0">Course</th>
                            <th class="head1">Start Date</th>
                            <th class="head0">End Date</th>
                            <th class="head0">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       <!-- <tr class="gradeX">
                          <td class="aligncenter"><span class="center">
                            <input type="checkbox" />
                          </span></td>
                            <td>Okpongu Ebimobowei</td>
                            <td>Middlesex University</td>
                            <td>Bsc. Information Technology</td>
                            <td>07-01-2012</td>
                            <td>07-01-2014</td>
                            <td><a href="profile.php">View Details</a></td>
                        </tr>-->
						<?php
							include "php/fetchcomplete.php";
						?>
                        

                    </tbody>
                </table>
                
                <div class="divider15"></div>
                
                
            </div><!--contentinner-->
        </div><!--maincontent-->
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
    
    <div class="clearfix"></div>
    
    <div class="footer">
    	<div class="footerleft">bayelsa State Scholarship Board</div>
    </div><!--footer-->
    
</div><!--mainwrapper-->

</body>
</html>
