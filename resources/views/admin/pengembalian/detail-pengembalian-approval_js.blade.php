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
    // Handle Delete Header
    // const handlePengembalianAdmin = (e, id) => {
    //     e.preventDefault();
    //     Swal.fire({
    //         title: "Are you sure?",
    //         text: "You won't be able to revert this!",
    //         icon: "warning",
    //         showCancelButton: true,
    //         confirmButtonColor: "#3085d6",
    //         cancelButtonColor: "#d33",
    //         confirmButtonText: "Yes, send it!"
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             $(`#pengembalianAdminForm-${id}`).submit();
    //         }
    //     });
    // }
</script>
