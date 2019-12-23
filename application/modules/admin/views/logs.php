 <div class="page-wrapper" id="vueapp">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-12 align-self-center">
                <h3 class="text-themecolor">Download Logs</h3>
            </div>
          
        </div>
      
        <!-- startt -->
        <div class="row">
                    <div class="col-12">
                         <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>File Downloaded</th>
                                                <th>Download Date</th>
                                                <th>Downloaded By:</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="log in logs" :key="log.log_id">
                                                <td>{{log.file_name}}</td>
                                                <td>{{log.download_date}}</td>
                                                <td>{{log.first_name }} {{log.last_name}}  </td>
                                                <td class="text-center actionsbtn">
                                                    <a title="Delete" href="javascript:;" @click="show_delete_log(log.log_id)" class="text-danger"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                   </div>

                    <!-- modal here -->
                    <div class="col-12">
                            <div id="addFileModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-file">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel"><i class="icon-File"></i> Upload File</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <form method="post" enctype="multipart/form-data" action="<?=base_url("admin/upload_file")?>" id="addFileForm">
                                                 <div class="modal-body">
                                                            <div class="form-group ">
                                                               <div class="row">
                                                                    <div class="col-md-12">
                                                                        <input size="20" id="file_upload" class="form-control" type="file" required="" name="file_upload" > 
                                                                     </div>
                                                               </div>
                                                            </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-def waves-effect" >Upload File</button>
                                                    <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                     </div>
                   <!-- end modal -->

                    <!-- modal here -->
                    <div class="col-12">
                            <div id="updateFileModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-file">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel"><i class="icon-File"></i> Update File</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <form method="post" enctype="multipart/form-data" action="<?=base_url("admin/update_file")?>" id="addFileForm">
                                                 <div class="modal-body">
                                                            <div class="form-group ">
                                                               <div class="row">
                                                                    <div class="col-md-12">
                                                                        <input size="20" id="file_upload" class="form-control" type="file" required="" name="file_upload" > 
                                                                     </div>
                                                               </div>
                                                            </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-def waves-effect" >Update</button>
                                                    <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                     </div>
                   <!-- end modal -->
                  
            
        </div>
        <!-- end content -->

    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer">
      
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>