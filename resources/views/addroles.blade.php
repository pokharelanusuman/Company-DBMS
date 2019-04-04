@extends('layouts.app')

@section('content')
{{-- {{( isset($role) && !empty($role) )? dd($role) : dd('no role')}} --}}
<addroles :onlyrole="{{( isset($role) && !empty($role) )? $role : 'null'}}"></addroles>
@endsection