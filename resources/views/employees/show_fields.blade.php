<div class="form-group">
    {!! Form::label('first_name', 'First Name:') !!}
    <p>{{ $employee->first_name }}</p>
</div>

<div class="form-group">
    {!! Form::label('last_name', 'Last Name:') !!}
    <p>{{ $employee->last_name }}</p>
</div>
 
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $employee->email }}</p>
</div>

<div class="form-group">
    {!! Form::label('phone', 'Phone No:') !!}
    <p>{{ $employee->phone }}</p>
</div>

<div class="form-group">
    {!! Form::label('company_name', 'Company Name:') !!}
    <p>{{ $employee->company->name }}</p>
</div>

<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $employee->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $employee->updated_at }}</p>
</div>

