    <script src="<?=base_url()?>assets/js/vue.min.js"></script>
    <script src="<?=base_url()?>assets/js/axios.js"></script>
   
    <script src="<?=base_url()?>assets/module/jquery/jquery.min.js"></script>
     <script src="<?=base_url()?>assets/js/formvalidate.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="<?=base_url()?>assets/module/bootstrap/js/popper.min.js"></script>
    <script src="<?=base_url()?>assets/module/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?=base_url()?>assets/module/ps/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="<?=base_url()?>assets/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?=base_url()?>assets/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?=base_url()?>assets/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="<?=base_url()?>assets/module/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?=base_url()?>assets/module/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
     <script src="<?=base_url()?>assets/module/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="<?=base_url()?>assets/module/sweetalert2/sweet-alert.init.js"></script>
    <script src="<?=base_url()?>assets/module/styleswitcher/jQuery.style.switcher.js"></script>
    <script>

         const base_url ="<?= base_url()?>";
         var vueapp = new Vue({
             el:"#vueapp",
             data(){
                 return{
                    users: <?= !empty($active_users) ? json_encode($active_users): "[]" ?>,
                    userdata:{
                        user_id:"",
                        fname:"",
                        lname:"",
                        username:"",
                        password:"",
                        email:"",
                        gender:"",
                        address:""
                    }
                 }
             },
             methods:{
                show_user_modal(){
                    $("#addUserModal").modal()
                },
                show_edit_user_modal(user_id){
                    let user = this.get_user(user_id)
                    this.userdata.user_id = user.user_id;
                    this.userdata.fname = user.first_name;
                    this.userdata.lname = user.last_name;
                    this.userdata.username = user.username;
                    this.userdata.password = user.password;
                    this.userdata.email = user.email;
                    this.userdata.gender = user.gender;
                    this.userdata.address = user.address;
                    $("#EditUserModal").modal()
                },
                show_delete_user(user_id){
                   Swal.fire({
                        title: 'Are you sure to delete?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                        if (result.value) {
                            let frmdata = new FormData();
                            frmdata.append("user_id", user_id);    
                            (async () => {
                                let res = await axios.post(`${base_url}admin/delete_user`, frmdata) ; 
                                if(res.data.code == 200){
                                     Swal.fire( 'Deleted!', 'User has been deleted.', 'success' );
                                    this.users = res.data.data;
                                }else{
                                    Swal.fire({ icon: 'Warning', title: '', text: 'deleting user failed!', })
                                }
                            })()
                        }
                   })
                },
                get_user(user_id){
                    return this.users.find((user) => user.user_id == user_id)
                },
             },
             computed:{
                employeeUser(){
                    return this.users.filter((user) => user.user_type == 2)
                }
                
             },
             mounted(){
                $('#myTable').DataTable();
             }
         })
         
        $(document).ready(function(){
           $("#adduserform").validate({
                rules: {
                    first_name: "required",
                    last_name: "required",
                    username: "required",
                    password: "required",
                    address: "required",
                    email: {
                        required: true,
                        email: true
                    },
                },
                messages: {
                    last_name: "Last name is required",
                    first_name: "First name is required",
                    username: "Username is required",
                    password: "Password is required",
                    email: "Email is required",
                    address: "Address is required",
                }
            });

            $("#edituserform").validate({
                rules: {
                    first_name: "required",
                    last_name: "required",
                    username: "required",
                    password: "required",
                    address: "required",
                    email: {
                        required: true,
                        email: true
                    },
                },
                messages: {
                    last_name: "Last name is required",
                    first_name: "First name is required",
                    username: "Username is required",
                    password: "Password is required",
                    email: "Email is required",
                    address: "Address is required",
                }
            });

            <?php
                $res_err = $this->session->flashdata('res_err');
                if(isset($res_err)) : ?>   
                    <?php if($res_err["err"]): ?>   
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: '<?=$res_err["msg"];?>',
                        })
                    <?php else: ?>
                        Swal.fire({
                            icon: 'success',
                            title: '',
                            text: '<?=$res_err["msg"];?>',
                        })
                    <?php endif ?>

                <?php endif ?>
           
        })
    </script>


    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?=base_url()?>assets/module/styleswitcher/jQuery.style.switcher.js"></script>
     </body>
</html>
