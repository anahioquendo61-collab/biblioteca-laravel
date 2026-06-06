@extends('layouts.app')

@section('content')
@include('categories._form', ['category' => $category])
@endsection