<script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert2@11.js') }}"></script>
{{-- csrf token --}}
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    // Handle Update Profile
    const handleUpdateProfile = (e, id) => {
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
                $(`#updateProfileForm-${id}`).submit();
            }
        });
    }

    // Handle Update Password
    const handleUpdatePasswordAdmin = (e, id) => {
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
                $(`#updatePasswordAdminForm-${id}`).submit();
            }
        });
    }
</script>
