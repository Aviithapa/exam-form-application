@extends('admin.layout.app')

@section('content')

   @include('admin.pages.municipality.form', ['model' => $municipality, 'districts' => $district])

@endsection