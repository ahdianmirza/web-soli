    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="/user">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-heading">Menu</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/header-peminjamanUser">
                    <i class="bi bi-card-list"></i>
                    <span>Peminjaman</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <button style="width: 100%" onclick="handleLogoutUser(event)" type="button" class="nav-link collapsed">
                    <i class="bi bi-box-arrow-in-left"></i>
                    <span>Logout</span>
                </button>
            </li><!-- End Register Page Nav -->
        </ul>

    </aside><!-- End Sidebar-->

    <script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2@11.js') }}"></script>
    <script>
        // Handle Logout User
        const handleLogoutUser = (e) => {
            e.preventDefault();
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, save it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/logout";
                }
            });
        }
    </script>
