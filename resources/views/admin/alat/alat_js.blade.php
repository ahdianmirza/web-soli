<script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
{{-- csrf token --}}
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    // Handle Delete Alat
    const handleDeleteAlat = (e, id_alat) => {
        e.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $(`#deleteAlatForm-${id_alat}`).submit();
            }
        });
    }
</script>
