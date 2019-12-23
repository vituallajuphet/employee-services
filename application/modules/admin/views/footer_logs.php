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
     <script src="<?=base_url()?>assets/module/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="<?=base_url()?>assets/module/sweetalert2/sweet-alert.init.js"></script>
    <script src="<?=base_url()?>assets/module/styleswitcher/jQuery.style.switcher.js"></script>
    <script>

         const base_url ="<?= base_url()?>";
         var vueapp = new Vue({
             el:"#vueapp",
             data(){
                 return{
                    logs: <?= !empty($logs) ? json_encode($logs) : "[]"?>
                 }
             },
             methods:{
                show_delete_log(log_id){
                    Swal.fire({
                        title: 'Are you sure to delete this log',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                        if (result.value) {
                            let frmdata = new FormData();
                            frmdata.append("log_id", log_id);    
                            (async () => {
                                let res = await axios.post(`${base_url}admin/delete_log`, frmdata) ; 
                                if(res.data.code == 200){
                                     Swal.fire( 'Deleted!', 'log has been deleted.', 'success' );
                                    this.logs = res.data.data;
                                }else{
                                    Swal.fire({ icon: 'Warning', title: '', text: 'deleting log failed!', })
                                }
                            })()
                        }
                   })
                }
             },
             computed:{
                getLogs(){
                    return this.logs;
                }
             },
             mounted(){
                $('#myTable').DataTable();
             }
         })
         
        $(document).ready(function(){
            
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


