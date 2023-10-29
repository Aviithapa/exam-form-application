@extends('admin.layout.app')

@section('content')

   @include('admin.pages.university.form', ['model' => $university])

@endsection