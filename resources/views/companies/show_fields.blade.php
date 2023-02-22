<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $company->name }}</p>
</div>
 
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $company->email }}</p>
</div>

<div class="form-group">
    {!! Form::label('website', 'Website:') !!}
    <p>{{ $company->website }}</p>
</div>

<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $company->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $company->updated_at }}</p>
</div>

