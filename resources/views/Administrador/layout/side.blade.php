<aside class="main-sidebar">
    <div class="nano">
        <div class="nano-content">
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li class="{{ Request::is('metricas*') ? 'active' : '' }}">
                    <a href="{{ route('metricas.index') }}">
                        <i class="fa fa-tachometer"></i> <span>Metricas</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>Layout Options</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                        <li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i>
                                Collapsed Sidebar</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>Charts</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview">
                            <a href="#"><i class="fa fa-circle-o"></i>
                                <span>ChartJS</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../charts/pie-chart.html"><i class="fa fa-circle-o"></i> Pie
                                        Chart</a></li>
                                <li><a href="../charts/line-chart.html"><i class="fa fa-circle-o"></i> Line
                                        Chart</a></li>
                                <li><a href="../charts/bar-chart.html"><i class="fa fa-circle-o"></i> Bar
                                        Chart</a></li>
                            </ul>
                        </li>
                        <li><a href="../charts/sparkline.html"><i class="fa fa-circle-o"></i> Sparkline</a>
                        </li>
                        <li><a href="../charts/flot-chart.html"><i class="fa fa-circle-o"></i> Flot Charts</a>
                        </li>

                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>UI Elements</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">

                        <li><a href="../elements/font-awesome-icons.html"><i class="fa fa-circle-o"></i>
                                Icons</a></li>
                        <li><a href="../elements/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
                        <li><a href="../elements/hr-timeline.html"><i class="fa fa-circle-o"></i> Horizontal
                                Timeline</a></li>
                        <li><a href="../elements/timeline.html"><i class="fa fa-circle-o"></i> Vertical
                                Timeline</a></li>
                        <li><a href="../elements/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
                        <li><a href="../elements/sweet-alert.html"><i class="fa fa-circle-o"></i> Sweet
                                Alerts</a></li>
                        <li><a href="../elements/accordion.html"><i class="fa fa-circle-o"></i> Accordions</a>
                        </li>
                        <li><a href="../elements/progressbars.html"><i class="fa fa-circle-o"></i> Progress
                                Bars</a></li>
                        <li><a href="../elements/toastr.html"><i class="fa fa-circle-o"></i> Toastr</a></li>
                        <li><a href="../elements/alerts.html"><i class="fa fa-circle-o"></i> Alert Box</a>
                        </li>
                        <li><a href="../elements/tooltip.html"><i class="fa fa-circle-o"></i> Tool Tip</a>
                        </li>
                        <li><a href="../elements/knob.html"><i class="fa fa-circle-o"></i> Knob</a></li>
                        <li><a href="../elements/slider.html"><i class="fa fa-circle-o"></i> Carousel</a></li>
                        <li><a href="../elements/pricing-table.html"><i class="fa fa-circle-o"></i> Pricing
                                Tables</a></li>
                        <li><a href="../elements/range-slider.html"><i class="fa fa-circle-o"></i> Range
                                Slider</a></li>
                        <li><a href="../elements/dropdowns.html"><i class="fa fa-circle-o"></i> Dropdowns</a>
                        </li>
                        <li><a href="../elements/grid-list.html"><i class="fa fa-circle-o"></i> Grid/List</a>
                        </li>
                        <li><a href="../elements/list-group.html"><i class="fa fa-circle-o"></i> List
                                Group</a></li>
                        <li><a href="../elements/cards.html"><i class="fa fa-circle-o"></i> Cards</a></li>
                        <li><a href="../elements/tabs.html"><i class="fa fa-circle-o"></i> Tabs & Pills</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-edit"></i> <span>Forms</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="../forms/general.html"><i class="fa fa-circle-o"></i> General
                                Elements</a></li>
                        <li><a href="../forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced
                                Elements</a></li>
                        <li><a href="../forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
                        <li><a href="../forms/form-wizard.html"><i class="fa fa-circle-o"></i> Form Wizard</a>
                        </li>
                        <li><a href="../forms/file-upload.html"><i class="fa fa-circle-o"></i> File Upload</a>
                        </li>
                        <li><a href="../forms/form-mask.html"><i class="fa fa-circle-o"></i> Formatter</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-table"></i> <span>Tables</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="basic.html"><i class="fa fa-circle-o"></i> Basic
                                tables</a></li>
                        <li><a href="advanced.html"><i class="fa fa-circle-o"></i> Advanced tables</a></li>
                        <li><a href="nestable.html"><i class="fa fa-circle-o"></i> NesTable</a></li>
                        <li><a href="jsgrid.html"><i class="fa fa-circle-o"></i> JS Grid</a></li>
                    </ul>
                </li>
                <li>
                    <a href="../calendar.html">
                        <i class="fa fa-calendar"></i> <span>Calendar</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-envelope"></i> <span>Mailbox</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="../mailbox/inbox.html"><i class="fa fa-circle-o"></i> Inbox</a></li>
                        <li><a href="../mailbox/compose.html"><i class="fa fa-circle-o"></i> Compose</a></li>
                        <li><a href="../mailbox/read-mail.html"><i class="fa fa-circle-o"></i> Read</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-map-o"></i> <span>Maps</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="../maps/google-map.html"><i class="fa fa-circle-o"></i> Google Map</a>
                        </li>
                        <li><a href="../maps/jvector-map.html"><i class="fa fa-circle-o"></i> jVector Map</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder"></i> <span>Custom Pages</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="../custompages/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a>
                        </li>
                        <li><a href="../custompages/profile.html"><i class="fa fa-circle-o"></i> Profile</a>
                        </li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-circle-o"></i> Login
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../custompages/login1.html"><i class="fa fa-circle-o"></i> Login
                                        Page 1</a></li>
                                <li><a href="../custompages/login2.html"><i class="fa fa-circle-o"></i> Login
                                        Page 2</a></li>
                                <li><a href="../custompages/login3.html"><i class="fa fa-circle-o"></i> Login
                                        Page 3</a></li>
                            </ul>
                        </li>
                        <li><a href="../custompages/register.html"><i class="fa fa-circle-o"></i> Register</a>
                        </li>
                        <li><a href="../custompages/lockscreen.html"><i class="fa fa-circle-o"></i>
                                Lockscreen</a></li>
                        <li><a href="../custompages/404.html"><i class="fa fa-circle-o"></i> 404 Error</a>
                        </li>
                        <li><a href="../custompages/500.html"><i class="fa fa-circle-o"></i> 500 Error</a>
                        </li>
                        <li><a href="../custompages/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-share"></i> <span>Multilevel</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-circle-o"></i> Level One
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                                <li class="treeview">
                                    <a href="#"><i class="fa fa-circle-o"></i> Level Two
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                    </ul>
                </li>

                <li class="header">LABELS</li>
                <li><a href="#"><i class="fa fa-circle-o text-danger"></i> <span>Important</span></a>
                </li>
                <li><a href="#"><i class="fa fa-circle-o text-warning"></i> <span>Warning</span></a>
                </li>
                <li><a href="#"><i class="fa fa-circle-o text-info"></i> <span>Information</span></a>
                </li>
            </ul>
        </div>
    </div>
</aside>
