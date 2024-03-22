@extends('admin.layout.app')

@section('content')

   @include('admin.pages.municipality.form', ['districts' => $district])

@endsection