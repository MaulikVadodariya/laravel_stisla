<div class="form-group col-sm-6">
    {!! Form::label('first_name', 'First Name:') !!}
    <span class="text-danger">*</span>
    {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Employee First Name']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('last_name', 'Last Name:') !!}
    <span class="text-danger">*</span>
    {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Employee Last Name']) !!}
</div>
  
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Employee Email']) !!}
</div>

<div class="form-group col-sm-12 col-sm-6">
    {!! Form::label('phone', 'Phone No:') !!}  
    {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Employee Phone Number']) !!}
</div>

<div class="form-group col-sm-6">   
    {!! Form::label('company_id', 'Company:') !!}
    {!! Form::select('company_id', $companies,$employee->company_id ?? null, ['class' => 'form-control', 'placeholder' => 'Select Company']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('employees.index') }}" class="btn btn-light">Cancel</a>
</div>
