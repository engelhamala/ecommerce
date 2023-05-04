<!-- #section:basics/sidebar -->
<div id="sidebar" class="sidebar responsive">
    <script type="text/javascript">
        // try {
        //     ace.settings.check('sidebar', 'fixed')
        // } catch (e) {}
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="ace-icon fa fa-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="ace-icon fa fa-pencil"></i>
            </button>

            <!-- #section:basics/sidebar.layout.shortcuts -->
            <button class="btn btn-warning">
                <i class="ace-icon fa fa-users"></i>
            </button>

            <button class="btn btn-danger">
                <i class="ace-icon fa fa-cogs"></i>
            </button>

            <!-- /section:basics/sidebar.layout.shortcuts -->
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- /.sidebar-shortcuts -->

    <ul class="nav nav-list">

        <li class="">
            {{-- <a href="{{ route('dashboard.dashboard') }}"> --}}
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> الرئيسية </span>
            </a>
            <b class="arrow"></b>
        </li>




        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text">
                    الأدمن
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="{{ route('dashboard.admin') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        كل الأدمن
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ route('dashboard.create-admin') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        إضافة أدمن جديد
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>



        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text">
                    اللغات
                </span>

                <b class="arrow fa fa-angle-down"></b>
                {{-- {{App\Models\Vendor::count()}} --}}
            </a>

            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="{{ route('dashboard.languages') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        كل اللغات
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ route('dashboard.create-languages') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        إضافة لغة جديد
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text">
                    الأقسام الرئيسية
                </span>

                <b class="arrow fa fa-angle-down"></b>
                {{-- {{App\Models\Vendor::count()}} --}}
            </a>

            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="{{ route('dashboard.maincategories') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        كل الأقسام الرئيسية
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ route('dashboard.create-maincategories') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        إضافة قسم جديد
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>


        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text">
                    الأقسام الفرعية
                </span>

                <b class="arrow fa fa-angle-down"></b>
                {{-- {{App\Models\Vendor::count()}} --}}
            </a>

            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="{{ route('dashboard.subcategories') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        كل الأقسام الفرعية
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ route('dashboard.create-subcategories') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        إضافة
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text">
                    المتاجر
                </span>

                <b class="arrow fa fa-angle-down"></b>
                {{-- {{App\Models\Vendor::count()}} --}}
            </a>

            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="{{ route('dashboard.vendor') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        كل المتاجر
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ route('dashboard.create-vendor') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        إضافة
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

    </ul><!-- /.nav-list -->

    <!-- #section:basics/sidebar.layout.minimize -->
    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i class="ace-icon fa fa-angle-double-right" data-icon1="ace-icon fa fa-angle-double-right"
            data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>

    <!-- /section:basics/sidebar.layout.minimize -->
    <script type="text/javascript">
        // try {
        //     ace.settings.check('sidebar', 'collapsed')
        // } catch (e) {}
    </script>
</div>

<!-- /section:basics/sidebar -->
