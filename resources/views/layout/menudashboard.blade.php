<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
    <li class="nav-item">
      <a href="/" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-folder-open"></i>
        <p>
          Barang
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
      <li class="nav-item">
          <a href="{{ URL::to('kategori') }}" class="nav-link">
            <i class="fas fa-cube"></i>
            <p>Kategori</p>
          </a>
        </li> 

      <li class="nav-item">
          <a href="{{ URL::to('produk') }}" class="nav-link">
            <i class="fas fa-cubes"></i>
            <p>Produk</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ URL::to('detail') }}" class="nav-link">
            <i class="fas fa-archive"></i>
            <p>Detail Kategori Produk</p>
          </a>
        </li>
      </ul>
    </li>

  </ul>
</nav>
