<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    <span class="text-danger">*</span>
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Company Name']) !!}
</div>

  
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Company Email']) !!}
</div>

<div class="form-group col-sm-12 col-sm-6">
    {!! Form::label('website', 'Website:') !!}  
    {!! Form::text('website', null, ['class' => 'form-control', 'placeholder' => 'Company Website']) !!}
</div>

<div class="form-group col-sm-12 col-sm-6"> 
    <input type="file" name="image" accept=".png, .jpg, .jpeg, .gif, .webp"/>
    @if(isset($company->logo_url))
    <img src="{{$company->logo_url}}" width="100px">
    @endif
</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('companies.index') }}" class="btn btn-light">Cancel</a>
</div>
