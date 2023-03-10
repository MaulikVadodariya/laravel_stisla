@extends('layouts.app')
@section('title')
    Employees
@endsection
@section('css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Employees</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('employees.create')}}" class="btn btn-primary form-btn">Add Employee <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
        @include('flash::message')
       <div class="card">
            <div class="card-body">
                @include('employees.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

@section('scripts')
    <script>
        let recordsURL = "{{ route('employees.index') }}/";
    </script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/employees/employees.js')}}"></script>
@endsection

