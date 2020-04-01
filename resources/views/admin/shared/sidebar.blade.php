<div class="scrollbar-sidebar">
    <div class="app-sidebar__inner">
        <ul class="vertical-nav-menu">
            <li class="app-sidebar__heading">Dashboards</li>
            <li>
                <a href="{{route('admin.index')}}" class="mm-active">
                    <i class="metismenu-icon pe-7s-rocket"></i>
                    Dashboard
                </a>
            </li>
            <li class="app-sidebar__heading">Productos</li>
            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-diamond"></i>
                    Productos
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li>
                        <a href="#">
                            <i class="metismenu-icon"></i>
                            Buttons
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="elements-buttons-standard.html">
                                    <i class="metismenu-icon">
                                    </i>Standard
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('admin.product.index')}}">
                            <i class="metismenu-icon">
                            </i>Productos
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.product.create')}}">
                            <i class="metismenu-icon">
                            </i>Crear
                        </a>
                    </li>
                </ul>
            </li>
            <li class="app-sidebar__heading">Categorías</li>
            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-menu"></i>
                    Categorías
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li>
                        <a href="{{route('admin.category.index')}}">
                            <i class="metismenu-icon">
                            </i>Categorías
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.category.create')}}">
                            <i class="metismenu-icon">
                            </i>Crear
                        </a>
                    </li>
                </ul>
            </li>
            <li class="app-sidebar__heading">Colores</li>
            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-paint"></i>
                    Colores
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li>
                        <a href="{{route('admin.color.index')}}">
                            <i class="metismenu-icon">
                            </i>Colores
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.color.create')}}">
                            <i class="metismenu-icon">
                            </i>Crear
                        </a>
                    </li>
                </ul>
            </li>
            <li class="app-sidebar__heading">PRO Version</li>
            <li>
                <a href="https://demo.dashboardpack.com/architectui-html-pro/" target="_blank">
                    <i class="metismenu-icon pe-7s-graph2">
                    </i>
                    Upgrade to PRO
                </a>
            </li>
        </ul>
    </div>
</div>