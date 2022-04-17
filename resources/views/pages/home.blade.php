@extends ('layouts.master')
@section('title', 'Home')

@section('content')
<div style="margin-top: 200px">
    THIS IS HOME
    <div>
        {{$data->username}}
    </div>

</div>
@endsection