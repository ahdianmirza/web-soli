    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-heading">Menu</li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Master Data</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <!-- <li>
                        <a href="fakultas">
                            <i class="bi bi-circle"></i><span>Fakultas</span>
                        </a>
                    </li>
                    <li>
                        <a href="departemen">
                            <i class="bi bi-circle"></i><span>Departemen</span>
                        </a>
                    </li> -->
                    <li>
                        <a href="/dosen">
                            <i class="bi bi-circle"></i><span>Dosen</span>
                        </a>
                    </li>
                    <li>
                        <a href="/lab">
                            <i class="bi bi-circle"></i><span>Lab</span>
                        </a>
                    </li>
                    <li>
                        <a href="/alat">
                            <i class="bi bi-circle"></i><span>Alat</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="/peminjaman-approval">
                    <i class="bi bi-card-list"></i>
                    <span>Peminjaman</span>
                </a>
            </li><!-- End Profile Page Nav -->
            <li class="nav-item">
                <button style="width: 100%" onclick="handleLogoutAdminSide(event)" type="button"
                    class="nav-link collapsed">
                    <i class="bi bi-box-arrow-in-left"></i>
                    <span>Logout</span>
                </button>
            </li><!-- End Register Page Nav -->
        </ul>

    </aside><!-- End Sidebar-->

    <script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2@11.js') }}"></script>
    <script>
        // Handle Logout Admin
        const handleLogoutAdminSide = (e) => {
            e.preventDefault();
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, logout!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/logout";
                }
            });
        }
    </script>
