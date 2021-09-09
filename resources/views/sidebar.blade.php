<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Admin: {{ Auth::user()->name}}  </h3>
        </div>
        <ul class="list-unstyled components">
            <a href="{{ route('index') }}">
                <p>Shop ping</p>
            </a>
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Menu</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="#">Quản trị users</a>
                    </li>
                    <li>
                        <a href="#">Quản trị sản phẩm</a>
                    </li>
                    <li>
                        <a href="#">Quản trị loại hàng</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('admin.users.index')}}">Quản trị users</a>
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#">Page 1</a>
                    </li>
                    <li>
                        <a href="#">Page 2</a>
                    </li>
                    <li>
                        <a href="#">Page 3</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('admin.products.index')}}">Quản trị sản phẩm</a>
            </li>
            <li>
                <a href="{{ route('admin.categories.index')}}">Quản trị loại hàng</a>
            </li>
            <li>
                <a href="{{ route('admin.invoices.index')}}">Quản trị đơn hàng</a>
            </li>
            <li>
                <a href="{{ route('admin.invoice_details.index')}}">Quản trị hóa đơn chi tiết</a>
            </li>
            <li>
                <a href="{{ route('admin.sliders.index')}}">Quản trị sliders</a>
            </li>
            <li>
                <a href="{{ route('admin.comments.index')}}">Quản trị comment</a>
            </li>
        </ul>
    </nav>
</div>