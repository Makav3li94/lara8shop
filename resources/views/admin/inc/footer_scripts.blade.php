<!-- ./wrapper -->


<!-- Vendor JS -->
{{--<script src="{{asset('backend/js/jquery.js')}}"></script>--}}
<script src="{{asset('backend/js/vendors.min.js')}}"></script>
<script src="{{asset('assets/icons/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}"></script>
<script src="{{asset('assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>
{{--<script src="{{asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>--}}
<script src="{{asset('assets/vendor_components/datatable/datatables.min.js')}}"></script>
<script src="{{asset('backend/js/pages/data-table.js')}}"></script>
<!-- Sunny Admin App -->

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function () {
        $(document).on('click','#delete',function (e) {
            e.preventDefault();
            var link = $(this).attr('href');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('form#delete_brand').submit();
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        })
    })
</script>
<script src="{{asset('backend/js/template.js')}}"></script>
<script src="{{asset('backend/js/pages/dashboard.js')}}"></script>
<script src="{{asset('backend/js/toastr.min.js')}}"></script>

<script>
    @if(session()->has('message'))
        var type = "{{session()->get('alert-type','info')}}";
        switch (type) {
            case 'info':
                toastr.info("{{session()->get('message')}}");
                break;
            case 'success':
                toastr.success("{{session()->get('message')}}");
                break;
            case 'warning':
                toastr.warning("{{session()->get('message')}}");
                break;
            case 'error':
                toastr.error("{{session()->get('message')}}");
                break;
        }
    @endif
</script>