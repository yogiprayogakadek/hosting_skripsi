@extends('templates.master')

@section('title', 'Kesehatan')
@section('pwd', 'Kesehatan')
@section('sub-pwd', 'Kesehatan')
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<div class="row render">
    {{--  --}}
</div>
@endsection

@push('script')
    <script src="{{asset('functions/kesehatan/main.js')}}"></script>
    <script>
        function assets(url) {
            var url = '{{ url("") }}/' + url;
            return url;
        }
    </script>
@endpush