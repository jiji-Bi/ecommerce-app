@section('delete')
@if ($message = Session::get('delete'))
{{-- <div class="alert alert-soft-success">{{ $message }}</div> --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    var message = {{ Js::from($message) }};
    new swal({
        icon: 'success',
        title: '',
        text: message,
        confirmButtonColor: "#3874ff",
        timer: 5000
    }).then((value) => {
        //location.reload();
    }).catch(swal.noop);
</script>
@endif
@endsection