

<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <li class="<?= $pagename == "dashboard" ? "active" : "" ?>"> <a class="waves-effect " href="<?=base_url("admin")?>" aria-expanded="false"><i class="icon-Car-Wheel"></i><span class="hide-menu">Dashboard </span></a> </li>
                <li> <a class="waves-effect " href="<?=base_url("admin/manageusers")?>" aria-expanded="false"><i class="icon-User"></i><span class="hide-menu">Manage Users</span></a>
             
                </li>
                 <li> <a class="waves-effect " href="<?=base_url("admin/managefiles")?>" aria-expanded="false"><i class="icon-Files"></i><span class="hide-menu">Manage Files</span></a> </li>
                 <li> <a class="waves-effect " href="<?=base_url("admin/logs")?>" aria-expanded="false"><i class="icon-Receipt-4"></i><span class="hide-menu">Download Logs</span></a> </li>
                <!-- <li> <a class="has-arrow waves-effect" href="javascript:;" aria-expanded="false"><i class="icon-El-Castillo"></i><span class="hide-menu">Multi level dd</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="javascript:;">item 1.1</a></li>
                        <li><a href="javascript:;">item 1.2</a></li>
                        <li> <a class="has-arrow" href="javascript:;" aria-expanded="false">Menu 1.3</a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="javascript:;">item 1.3.1</a></li>
                                <li><a href="javascript:;">item 1.3.2</a></li>
                                <li><a href="javascript:;">item 1.3.3</a></li>
                                <li><a href="javascript:;">item 1.3.4</a></li>
                            </ul>
                        </li>
                        <li><a href="#">item 1.4</a></li>
                    </ul>
                </li> -->
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>