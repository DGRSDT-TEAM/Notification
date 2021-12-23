<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Dashboard</span>
                            </div>

                            <div class="clearfix"></div>
                        </a>

                    </li>

                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Ajouter</li>





                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                            <div class="pull-left"><i class="ti-info"></i><span class="right-nav-text">Notification</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                            <li>
                                <a href="{{route('notif.index')}}"><i class="ti-comments"></i><span class="right-nav-text">Toute les notifications
                            </span></a>
                            </li>


                            <li>
                                <a href="{{route('notif.create')}}"><i class="ti-comments"></i><span class="right-nav-text">Nouvelle Notif
                            </span></a>
                            </li>
                        </ul>
                    </li>






                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Configuration</li>

                    <li>
                        <a href="{{route('etabs.index')}}"><i class="ti-comments"></i><span class="right-nav-text">Etablissements
                            </span></a>
                    </li>

                    <li>
                        <a href="{{route('entites.index')}}"><i class="ti-comments"></i><span class="right-nav-text">Entités
                            </span></a>
                    </li>


                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Administration</li>

                    <li>
                        <a href="#"><i class="ti-comments"></i><span class="right-nav-text">Utilisateurs
                            </span></a>
                    </li>

                </ul>
                </li>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
