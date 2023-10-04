@extends('admin.layout.app')

@section('content')

   @include('admin.pages.exam.form', ['model' => $exam])

@endsection