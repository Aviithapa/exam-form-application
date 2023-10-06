@extends('admin.layout.app')

@section('content')

   @include('admin.pages.applicant.qualification.form', ['model' => $qualification])

@endsection