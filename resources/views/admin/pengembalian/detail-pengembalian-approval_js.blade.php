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
