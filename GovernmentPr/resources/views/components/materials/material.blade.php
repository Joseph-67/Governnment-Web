<x-layouts.admin-app>
    @section('styles')
 <!-- App css -->
     <link href="{{asset('adminAssets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
     <link href="{{asset('adminAssets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
     <link href="{{asset('adminAssets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

     <link rel="stylesheet" href="{{asset('adminAssets/libs/quill/quill.snow.css')}}">
     <link rel="shortcut icon" href="{{asset('adminAssets/images/favicon.ico')}}">

     <link href="{{asset('adminAssets/libs/mobius1-selectr/selectr.min.css')}}" rel="stylesheet" type="text/css" />
     <link href="{{asset('adminAssets/libs/huebee/huebee.min.css')}}" rel="stylesheet" type="text/css" />
     <link href="{{asset('adminAssets/libs/vanillajs-datepicker/css/datepicker.min.css')}}" rel="stylesheet" type="text/css" />

       
    <link href="{{asset('adminAssets/libs/uppy/uppy.min.css')}}" rel="stylesheet" type="text/css " />

    <link href="{{asset('adminAssets/libs/simple-datatables/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('adminAssets/libs/mobius1-selectr/selectr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('adminAssets/libs/huebee/huebee.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.4.1/dist/css/tom-select.css" rel="stylesheet">
    @endsection
    @section('scripts')
    <script src="{{asset('adminAssets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('adminAssets/libs/mobius1-selectr/selectr.min.js')}}"></script>
    <script src="{{asset('adminAssets/libs/huebee/huebee.pkgd.min.js')}}"></script>
    <script src="{{asset('adminAssets/js/pages/forms-advanced.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.1/dist/js/tom-select.complete.min.js"></script>
    <script>
        // new Selectr("#guardSelect",{taggable:!0,tagSeperators:[",","|"]}), new Selectr("#guardSelect2",{taggable:!0,tagSeperators:[",","|"]})
        new TomSelect('#guardSelect2',{maxItems: 5});
        new TomSelect('#guardSelect',{maxItems: 5});
    </script>
    <script src="{{asset('adminAssets/libs/simple-datatables/umd/simple-datatables.js')}}"></script>
    <script src="{{asset('adminAssets/js/pages/datatable.init.js')}}"></script>
    <script src="{{asset('adminAssets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('adminAssets/libs/quill/quill.js')}}"></script>
        <script src="{{asset('adminAssets/js/pages/form-editor.init.js')}}"></script>
        <script src="{{asset('adminAssets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('adminAssets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('adminAssets/libs/uppy/uppy.legacy.min.js')}}"></script>
        <script src="{{asset('adminAssets/js/pages/file-upload.init.js')}}"></script>
        <script src="{{asset('adminAssets/js/app.js')}}"></script>

        <script src="{{asset('adminAssets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('adminAssets/libs/mobius1-selectr/selectr.min.js')}}"></script>
        <script src="{{asset('adminAssets/libs/huebee/huebee.pkgd.min.js')}}"></script>
        <script src="{{asset('adminAssets/libs/vanillajs-datepicker/js/datepicker-full.min.js')}}"></script>
        <script src="{{asset('adminAssets/js/moment.js')}}"></script>
        <script src="{{asset('adminAssets/libs/imask/imask.min.js')}}"></script>
        <script src="{{asset('adminAssets/js/pages/forms-advanced.js')}}"></script>
    @endsection


</x-layouts.admin-app>