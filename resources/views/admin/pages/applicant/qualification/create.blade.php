@extends('admin.layout.app')

@section('content')

   @include('admin.pages.applicant.qualification.form', ['univerisity' => $university])

@endsection