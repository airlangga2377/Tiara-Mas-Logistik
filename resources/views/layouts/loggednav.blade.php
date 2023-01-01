<nav class="navbar navbar-light shadow-sm"> 
    <div class="container-fluid"> 
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="dropdown">
            <a class="ms-2 me-2 fs-5 text-dark text-decoration-none" href="{{ url('home') }}">Beranda</a>
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ $name }}
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ url('logout') }}">Keluar</a></li> 
            </ul>
        </div>

        <div class="offcanvas offcanvas-start text-bg-light" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">     
                <button type="button" class="btn-close offcanvas-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body"> 
                <div class="list-group list-group-flush"> 
                    <a role="button" class="fs-5 fw-bold list-group-item list-group-item-action" href="{{ url('barang') }}">Barang</a>  
                    <div class="accordion accordion-flush" id="accordionFlushNav">
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="flushHadingNav">
                            <button class="fs-5 accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                            Pengiriman
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flushHadingNav" data-bs-parent="#accordionFlushNav">
                            <div class="accordion-body">
                            <a role="button" class="fs-5 list-group-item list-group-item-action border-0" href="{{ url('barang/bis/insert#pengiriman') }}">Bis</a>
                            <a role="button" class="fs-5 list-group-item list-group-item-action border-0" href="{{ url('barang/truk/insert#pengiriman') }}">Truk</a>
                            </div>
                        </div>
                        </div>
                    </div>
                    <a role="button" class="fs-5 fw-bold list-group-item list-group-item-action" href="{{ url('barang/manifest') }}">Manifest</a>  
    
                    @yield('top-nav-bar-custom')
                </div>
            </div>
        </div> 
    </div>
    </nav>