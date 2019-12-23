 <div class="page-wrapper" id="vueapp">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Manage Users</h3>
            </div>
            <div class="col-md-7 align-self-center text-right d-none d-md-block">
                <button type="button" class="btn btn-info" @click="show_user_modal()"><i class="fa fa-plus-circle"></i> Add User</button>
            </div>
        </div>
        <!-- startt -->
        <div class="row">
                    <div class="col-12">
                         <div class="card">
                            <div class="card-body">
                                 <div class="rowlegend">
                                     <span>Active</span>
                                     <span>Inactive</span>
                                 </div>
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Username</th>
                                                <!-- <th>Status</th> -->
                                                <th>Online</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for ="user in employeeUser" :key="user.user_id">
                                                <td>{{user.first_name}}</td>
                                                <td>{{user.last_name}}</td>
                                                <td>{{user.username}}</td>
                                                <!-- <td>{{user.user_status}}</td> -->
                                                <td :title="user.is_logged == 0 ? 'Inactive' : 'Active'" ><span :class="user.is_logged == 0 ? 'not_logged_in' : 'logged_in'"></span></td>
                                                <td class="text-center">
                                                    <a title="Edit" href="javascript:;" @click="show_edit_user_modal(user.user_id)"><i class="fas fa-edit"></i></a>
                                                    <a title="Delete" @click="show_delete_user(user.user_id)" href="javascript:;" class="text-danger"><i class="fas fa-trash"></i></a>
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
                            <div id="addUserModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel"><i class="icon-User"></i> Add User</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <form method="post" action="<?=base_url("admin/save_user")?>" id="adduserform">
                                                 <div class="modal-body">
                                                            <div class="form-group ">
                                                               <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="first_name">First Name</label>
                                                                        <input id="first_name" class="form-control" type="text" required="" name="first_name" > 
                                                                     </div>
                                                                    <div class="col-md-6">
                                                                        <label for="last_name">Last Name</label>
                                                                        <input id="last_name" class="form-control" type="text" required="" name="last_name" > 
                                                                    </div>
                                                               </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="username">Username</label>
                                                                        <input id="username" class="form-control" type="text" required="" name="username" > 
                                                                     </div>
                                                                    <div class="col-md-6">
                                                                        <label for="password">Password</label>
                                                                        <input id="password" class="form-control" type="password" required="" name="password" > 
                                                                    </div>
                                                               </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="email">Email</label>
                                                                        <input id="email" class="form-control" type="email" required="" name="email" > 
                                                                     </div>
                                                                    <div class="col-md-6">
                                                                        <label for="gender">Gender</label>
                                                                        <select id="gender" class="form-control" name="gender">
                                                                            <option value="Male">Male</option>
                                                                            <option value="Female">Female</option>
                                                                        </select> 
                                                                    </div>
                                                               </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <label for="address">Address</label>
                                                                        <input id="address" class="form-control" type="text" required="" name="address" > 
                                                                     </div>
                                                               </div>
                                                            </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-def waves-effect" >Register</button>
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

                     <div class="col-12">
                            <div id="EditUserModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel"><i class="icon-User"></i> Update User Profile</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <form method="post" action="<?=base_url("admin/update_user")?>" id="edituserform">
                                                 <div class="modal-body">
                                                            <div class="form-group ">
                                                                <input type="hidden" v-model="userdata.user_id" name="user_id">
                                                               <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="first_name">First Name</label>
                                                                        <input v-model="userdata.fname" id="first_name" class="form-control" type="text" required="" name="first_name" > 
                                                                     </div>
                                                                    <div class="col-md-6">
                                                                        <label for="last_name">Last Name</label>
                                                                        <input v-model="userdata.lname" id="last_name" class="form-control" type="text" required="" name="last_name" > 
                                                                    </div>
                                                               </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="username">Username</label>
                                                                        <input v-model="userdata.username" id="username" class="form-control" type="text" required="" name="username" > 
                                                                     </div>
                                                                    <div class="col-md-6">
                                                                        <label for="password">Password</label>
                                                                        <input v-model="userdata.password" id="password" class="form-control" type="password" required="" name="password" > 
                                                                    </div>
                                                               </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="email">Email</label>
                                                                        <input v-model="userdata.email" id="email" class="form-control" type="email" required="" name="email" > 
                                                                     </div>
                                                                    <div class="col-md-6">
                                                                        <label for="gender">Gender</label>
                                                                        <select v-model="userdata.gender" id="gender" class="form-control" name="gender" required>
                                                                            <option value="">Select Gender</option>
                                                                            <option value="Male">Male</option>
                                                                            <option value="Female">Female</option>
                                                                        </select> 
                                                                    </div>
                                                               </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <label for="address">Address</label>
                                                                        <input v-model="userdata.address" id="address" class="form-control" type="text" required="" name="address" > 
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
      Better Life Home Care Group
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>