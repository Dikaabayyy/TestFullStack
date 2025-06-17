<aside id="sidebar" class="sidebar">

      <li>
        <a class="{{ Route::is('dashboard') ? 'nav-link' : 'nav-link collapsed' }}" href="/dashboard">
          <i class="bi bi-grid"></i><span>Dashboard</span>
        </a>
      </li>


      <li>
        <button class="dropdown-btn {{ Route::is('house', 'house-add', 'house-edit') ? 'nav-link' : 'nav-link collapsed' }}"><i class="bi bi-house-fill"></i>Rumah</button>
        <div class="dropdown-content">
            <a class="{{ Route::is('house' , 'house-edit') ? 'nav-link' : 'nav-link collapsed' }}" href="/house-data">
                <i class="bi bi-houses-fill"></i><span>Data Rumah</span>
            </a>
            <a class="{{ Route::is('house-add') ? 'nav-link' : 'nav-link collapsed' }}" href="/add-house-data">
                <i class="bi bi-house-add-fill"></i><span>Tambah Data Rumah</span>
            </a>
        </div>
      </li>

      <li>
        <button class="dropdown-btn {{ Route::is('residents', 'residents-add', 'residents-edit') ? 'nav-link' : 'nav-link collapsed' }}"><i class="bi bi-people-fill"></i></i>Penghuni</button>
        <div class="dropdown-content">
            <a class="{{ Route::is('residents', 'residents-edit') ? 'nav-link' : 'nav-link collapsed' }}" href="/residents-data">
                <i class="bi bi-person-lines-fill"></i><span>Data Penghuni</span>
            </a>
            <a class="{{ Route::is('residents-add') ? 'nav-link' : 'nav-link collapsed' }}" href="/add-residents-data">
                <i class="bi bi-person-fill-add"></i><span>Tambah Data Penghuni</span>
            </a>
        </div>
      </li>

      <li>
        <button class="dropdown-btn {{ Route::is('payments', 'payments-add', 'payments-edit') ? 'nav-link' : 'nav-link collapsed' }}"><i class="bi bi-cash-coin"></i></i>Pembayaran</button>
        <div class="dropdown-content">
            <a class="{{ Route::is('payments', 'payments-edit') ? 'nav-link' : 'nav-link collapsed' }}" href="/payments-data">
                <i class="bi bi-cash-stack"></i><span>Data Pembayaran</span>
            </a>
            <a class="{{ Route::is('payments-add') ? 'nav-link' : 'nav-link collapsed' }}" href="/add-payments-data">
                <i class="bi bi-coin"></i><span>Tambah Data Pembayaran</span>
            </a>
        </div>

      </li>

      <li>
        <a class="nav-link collapsed" href="/">
          <i class="bi bi-box-arrow-right"></i><span>Keluar</span>
        </a>
      </li>
    </ul>

</aside>
