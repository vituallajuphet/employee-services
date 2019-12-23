 <div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-12 align-self-center">
                <h3 class="text-themecolor">Dashboard</h3>
               
            </div>
           
         
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Info box -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex p-10 no-block">
                            <div class="align-slef-center">
                                <h2 class="m-b-0"><?= count($active_users);?></h2>
                                <h6 class="text-muted m-b-0 dashh6">Number of Users</h6>
                            </div>
                            <div class="align-self-center display-6 ml-auto"><i class="text-deff icon-Target-Market"></i></div>
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-success bg-def" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:70%; height:3px;"> <span class="sr-only">50% Complete</span></div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex p-10 no-block">
                            <div class="align-slef-center">
                                <h2 class="m-b-0 "><?= count($allfiles);?></h2>
                                <h6 class="text-muted m-b-0 dashh6">Number of Files</h6>
                            </div>
                            <div class="align-self-center display-6 ml-auto"><i class="text-info text-blue icon-Files"></i></div>
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-info bg-blue" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:70%; height:3px;"> <span class="sr-only">50% Complete</span></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex p-10 no-block">
                            <div class="align-slef-center">
                                <h2 class="m-b-0"><?= count($alldownloads);?></h2>
                                <h6 class="text-muted m-b-0 dashh6">Number of Downloads</h6>
                            </div>
                            <div class="align-self-center display-6 ml-auto"><i class="text-info text-blue icon-Download"></i></div>
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-info bg-succ" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:70%; height:3px;"> <span class="sr-only">50% Complete</span></div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                 <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Monthly Report</h4>
                        <div id="bar-chart" style="width:100%; height:400px;"></div>
                    </div>
                </div>
            </div>
    
        </div>
      
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer">
       Better Life Home Care Group
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>