<!-- ./wrapper -->


<!-- Vendor JS -->
{{--<script src="{{asset('backend/js/jquery.js')}}"></script>--}}
<script src="{{asset('backend/js/vendors.min.js')}}"></script>
<script src="{{asset('assets/icons/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}"></script>
<script src="{{asset('assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>
{{--<script src="{{asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>--}}

<!-- Sunny Admin App -->
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