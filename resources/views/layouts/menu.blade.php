<header>
    <nav>
        <!-- Mobile layout: visible only on mobile -->
        <div class="d-flex align-items-center d-md-none">
            <img class="logo" src="{{ url('img/setecom_logo.png') }}" alt="logo_setecom">
            <span class="fw-bold title-logo">SETECOM AIR</span>
        </div>

        <!-- Hidden checkbox for mobile menu toggle -->
        <input type="checkbox" id="btn-menu">

        <!-- Mobile menu icon -->
        <label for="btn-menu" class="icon-menu d-md-none">
            <i class="fas fa-bars"></i>
        </label>
        <ul class="menu">
            <li class="d-flex logo-container">
                <div class="d-flex align-items-center">
                    <img class="logo" src="{{ url('img/setecom_logo.png') }}" alt="logo_setecom">
                    <span class="ms-2 fw-bold title-logo">SETECOM AIR</span>
                </div>
            </li>
            <li class="menu-item">
                <a href="{{ url('/') }}" target="_self">Inicio</a>
            </li>
            <li class="menu-item">
                <a href="#servicios" target="_self">Servicios</a>
            </li>
            <li class="menu-item">
                <a href="#clientes" target="_self">Clientes</a>
            </li>
            <li class="menu-item">
            <a href="{{ url('/productos') }}" target="_self">Productos</a>
            </li>
            <li class="menu-item">
                <a href="#contacto" target="_self">Contacto</a>
            </li>
            <li class="menu-item">
                <a href="{{ url('/admin') }}" target="_self">
                    <i class="fas fa-lock"></i> Admin
                </a>
            </li>
        </ul>
    </nav>
</header>
