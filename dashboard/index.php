<?php
session_start();
if($_SESSION["logado"] == true && $_SESSION["nivel"] == 1){
?>

<!DOCTYPE html>
<html>

 <?php  include_once("includes/head.php") ?>

<body>
    <div id="wrapper">
        
       <?php  include_once("includes/nav.php") ?>
       
        <?php  include_once("includes/sidebar-left.php") ?>
      
		<div id="page-wrapper">
		  <div class="header"> 
                        <h1 class="page-header">
                            Dashboard <small>Resumo do seu App</small>
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="#">Home</a></li>
					  <li class="active">Data</li>
					</ol> 
									
		</div>
            <div id="page-inner">
                <p>Aqui vai algumas notícias</p>
                <!-- /. ROW  -->

  <!--              <div class="row">-->
  <!--                  <div class="col-md-3 col-sm-12 col-xs-12">-->
  <!--                      <div class="panel panel-primary text-center no-boder blue">-->
  <!--                          <div class="panel-left pull-left blue">-->
  <!--                              <i class="fa fa-eye fa-5x"></i>-->
                                
  <!--                          </div>-->
  <!--                          <div class="panel-right">-->
		<!--						<h3>10,253</h3>-->
  <!--                             <strong> Daily Visits</strong>-->
  <!--                          </div>-->
  <!--                      </div>-->
  <!--                  </div>-->
  <!--                  <div class="col-md-3 col-sm-12 col-xs-12">-->
  <!--                      <div class="panel panel-primary text-center no-boder blue">-->
  <!--                            <div class="panel-left pull-left blue">-->
  <!--                              <i class="fa fa-shopping-cart fa-5x"></i>-->
		<!--						</div>-->
                                
  <!--                          <div class="panel-right">-->
		<!--					<h3>33,180 </h3>-->
  <!--                             <strong> Sales</strong>-->

  <!--                          </div>-->
  <!--                      </div>-->
  <!--                  </div>-->
  <!--                  <div class="col-md-3 col-sm-12 col-xs-12">-->
  <!--                      <div class="panel panel-primary text-center no-boder blue">-->
  <!--                          <div class="panel-left pull-left blue">-->
  <!--                              <i class="fa fa fa-comments fa-5x"></i>-->
                               
  <!--                          </div>-->
  <!--                          <div class="panel-right">-->
		<!--					 <h3>16,022 </h3>-->
  <!--                             <strong> Comments </strong>-->

  <!--                          </div>-->
  <!--                      </div>-->
  <!--                  </div>-->
  <!--                  <div class="col-md-3 col-sm-12 col-xs-12">-->
  <!--                      <div class="panel panel-primary text-center no-boder blue">-->
  <!--                          <div class="panel-left pull-left blue">-->
  <!--                              <i class="fa fa-users fa-5x"></i>-->
                                
  <!--                          </div>-->
  <!--                          <div class="panel-right">-->
		<!--					<h3>36,752 </h3>-->
  <!--                           <strong>No. of Visits</strong>-->

  <!--                          </div>-->
  <!--                      </div>-->
  <!--                  </div>-->
  <!--              </div>-->
				
		<!--		<div class="row">-->
		<!--		<div class="col-md-5">-->
		<!--				<div class="panel panel-default">-->
		<!--				<div class="panel-heading">-->
		<!--					Line Chart-->
		<!--				</div>-->
		<!--				<div class="panel-body">-->
		<!--					<div id="morris-line-chart"></div>-->
		<!--				</div>						-->
		<!--			</div>   -->
		<!--			</div>		-->
					
		<!--				<div class="col-md-7">-->
		<!--			<div class="panel panel-default">-->
		<!--			<div class="panel-heading">-->
  <!--                              Bar Chart Example-->
  <!--                          </div>-->
  <!--                          <div class="panel-body">-->
  <!--                              <div id="morris-bar-chart"></div>-->
  <!--                          </div>-->
						
		<!--			</div>  -->
		<!--			</div>-->
					
		<!--		</div> -->
			 
				
			
		<!--<div class="row">-->
		<!--	<div class="col-xs-6 col-md-3">-->
		<!--		<div class="panel panel-default">-->
		<!--			<div class="panel-body easypiechart-panel">-->
		<!--				<h4>Customers</h4>-->
		<!--				<div class="easypiechart" id="easypiechart-blue" data-percent="82" ><span class="percent">82%</span>-->
		<!--				</div>-->
		<!--			</div>-->
		<!--		</div>-->
		<!--	</div>-->
		<!--	<div class="col-xs-6 col-md-3">-->
		<!--		<div class="panel panel-default">-->
		<!--			<div class="panel-body easypiechart-panel">-->
		<!--				<h4>Sales</h4>-->
		<!--				<div class="easypiechart" id="easypiechart-orange" data-percent="55" ><span class="percent">55%</span>-->
		<!--				</div>-->
		<!--			</div>-->
		<!--		</div>-->
		<!--	</div>-->
		<!--	<div class="col-xs-6 col-md-3">-->
		<!--		<div class="panel panel-default">-->
		<!--			<div class="panel-body easypiechart-panel">-->
		<!--				<h4>Profits</h4>-->
		<!--				<div class="easypiechart" id="easypiechart-teal" data-percent="84" ><span class="percent">84%</span>-->
		<!--				</div>-->
		<!--			</div>-->
		<!--		</div>-->
		<!--	</div>-->
		<!--	<div class="col-xs-6 col-md-3">-->
		<!--		<div class="panel panel-default">-->
		<!--			<div class="panel-body easypiechart-panel">-->
		<!--				<h4>No. of Visits</h4>-->
		<!--				<div class="easypiechart" id="easypiechart-red" data-percent="46" ><span class="percent">46%</span>-->
		<!--				</div>-->
		<!--			</div>-->
		<!--		</div>-->
		<!--	</div>-->
		<!--</div><!--/.row-->
			
				
  <!--              <div class="row">-->
  <!--                  <div class="col-md-9 col-sm-12 col-xs-12">-->
  <!--                      <div class="panel panel-default">                            -->
		<!--					<div class="panel-heading">-->
		<!--					Area Chart-->
		<!--				</div>-->
		<!--				<div class="panel-body">-->
		<!--					<div id="morris-area-chart"></div>-->
		<!--				</div>-->
  <!--                      </div>-->
  <!--                  </div>-->
  <!--                  <div class="col-md-3 col-sm-12 col-xs-12">-->
  <!--                      <div class="panel panel-default">-->
  <!--                          <div class="panel-heading">-->
  <!--                              Donut Chart Example-->
  <!--                          </div>-->
  <!--                          <div class="panel-body">-->
  <!--                              <div id="morris-donut-chart"></div>-->
  <!--                          </div>-->
  <!--                      </div>-->
  <!--                  </div>-->

  <!--              </div>-->
		<!--		<div class="row">-->
		<!--		<div class="col-md-12">-->
				
		<!--			</div>		-->
		<!--		</div> 	-->
                <!-- /. ROW  -->

	   
				
				
				
  <!--              <div class="row">-->
  <!--                  <div class="col-md-4 col-sm-12 col-xs-12">-->
  <!--                      <div class="panel panel-default">-->
  <!--                          <div class="panel-heading">-->
  <!--                              Tasks Panel-->
  <!--                          </div>-->
  <!--                          <div class="panel-body">-->
  <!--                              <div class="list-group">-->

  <!--                                  <a href="#" class="list-group-item">-->
  <!--                                      <span class="badge">7 minutes ago</span>-->
  <!--                                      <i class="fa fa-fw fa-comment"></i> Commented on a post-->
  <!--                                  </a>-->
  <!--                                  <a href="#" class="list-group-item">-->
  <!--                                      <span class="badge">16 minutes ago</span>-->
  <!--                                      <i class="fa fa-fw fa-truck"></i> Order 392 shipped-->
  <!--                                  </a>-->
  <!--                                  <a href="#" class="list-group-item">-->
  <!--                                      <span class="badge">36 minutes ago</span>-->
  <!--                                      <i class="fa fa-fw fa-globe"></i> Invoice 653 has paid-->
  <!--                                  </a>-->
  <!--                                  <a href="#" class="list-group-item">-->
  <!--                                      <span class="badge">1 hour ago</span>-->
  <!--                                      <i class="fa fa-fw fa-user"></i> A new user has been added-->
  <!--                                  </a>-->
  <!--                                  <a href="#" class="list-group-item">-->
  <!--                                      <span class="badge">1.23 hour ago</span>-->
  <!--                                      <i class="fa fa-fw fa-user"></i> A new user has added-->
  <!--                                  </a>-->
  <!--                                  <a href="#" class="list-group-item">-->
  <!--                                      <span class="badge">yesterday</span>-->
  <!--                                      <i class="fa fa-fw fa-globe"></i> Saved the world-->
  <!--                                  </a>-->
  <!--                              </div>-->
  <!--                              <div class="text-right">-->
  <!--                                  <a href="#">More Tasks <i class="fa fa-arrow-circle-right"></i></a>-->
  <!--                              </div>-->
  <!--                          </div>-->
  <!--                      </div>-->

  <!--                  </div>-->
  <!--                  <div class="col-md-8 col-sm-12 col-xs-12">-->

  <!--                      <div class="panel panel-default">-->
  <!--                          <div class="panel-heading">-->
  <!--                              Responsive Table Example-->
  <!--                          </div> -->
  <!--                          <div class="panel-body">-->
  <!--                              <div class="table-responsive">-->
  <!--                                  <table class="table table-striped table-bordered table-hover">-->
  <!--                                      <thead>-->
  <!--                                          <tr>-->
  <!--                                              <th>S No.</th>-->
  <!--                                              <th>First Name</th>-->
  <!--                                              <th>Last Name</th>-->
  <!--                                              <th>User Name</th>-->
  <!--                                              <th>Email ID.</th>-->
  <!--                                          </tr>-->
  <!--                                      </thead>-->
  <!--                                      <tbody>-->
  <!--                                          <tr>-->
  <!--                                              <td>1</td>-->
  <!--                                              <td>John</td>-->
  <!--                                              <td>Doe</td>-->
  <!--                                              <td>John15482</td>-->
  <!--                                              <td>name@site.com</td>-->
  <!--                                          </tr>-->
  <!--                                          <tr>-->
  <!--                                              <td>2</td>-->
  <!--                                              <td>Kimsila</td>-->
  <!--                                              <td>Marriye</td>-->
  <!--                                              <td>Kim1425</td>-->
  <!--                                              <td>name@site.com</td>-->
  <!--                                          </tr>-->
  <!--                                          <tr>-->
  <!--                                              <td>3</td>-->
  <!--                                              <td>Rossye</td>-->
  <!--                                              <td>Nermal</td>-->
  <!--                                              <td>Rossy1245</td>-->
  <!--                                              <td>name@site.com</td>-->
  <!--                                          </tr>-->
  <!--                                          <tr>-->
  <!--                                              <td>4</td>-->
  <!--                                              <td>Richard</td>-->
  <!--                                              <td>Orieal</td>-->
  <!--                                              <td>Rich5685</td>-->
  <!--                                              <td>name@site.com</td>-->
  <!--                                          </tr>-->
  <!--                                          <tr>-->
  <!--                                              <td>5</td>-->
  <!--                                              <td>Jacob</td>-->
  <!--                                              <td>Hielsar</td>-->
  <!--                                              <td>Jac4587</td>-->
  <!--                                              <td>name@site.com</td>-->
  <!--                                          </tr>-->
  <!--                                          <tr>-->
  <!--                                              <td>6</td>-->
  <!--                                              <td>Wrapel</td>-->
  <!--                                              <td>Dere</td>-->
  <!--                                              <td>Wrap4585</td>-->
  <!--                                              <td>name@site.com</td>-->
  <!--                                          </tr>-->

  <!--                                      </tbody>-->
  <!--                                  </table>-->
  <!--                              </div>-->
  <!--                          </div>-->
  <!--                      </div>-->

  <!--                  </div>-->
  <!--              </div>-->
                <!-- /. ROW  -->
			
		
				<footer><p>Todos os Direitos Reservados <a href="#"></a></p>
				
        
				</footer>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
  <?php include_once("includes/js.php"); ?>

</body>

</html>

<?php  
}else{
  	header("Location: ../login.php");
}
?>