<div class="form-group">
    {!! Form::label('name', __("words.name"), ['class' => 'awesome']) !!}
    {{ Form::text('name', null, ['class' => 'form-control '.($errors->has('name') ? 'is-invalid':'is-valid')]) }}
    @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>




<div class="form-group">
    {!! Form::label('email', __("words.email"), ['class' => 'awesome']) !!}
    {{ Form::text('email', null, ['class' => 'form-control '.($errors->has('email') ? 'is-invalid':'is-valid')]) }}
    @error('email')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('password', __("words.password"), ['class' => 'awesome']) !!}
    {{ Form::password('password', ['class' => 'form-control '.($errors->has('password') ? 'is-invalid':'is-valid')]) }}
    @error('password')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('password_confirmation', __("words.password confirmation"), ['class' => 'awesome']) !!}
    {{ Form::password('password_confirmation', ['class' => 'form-control '.($errors->has('password_confirmation') ? 'is-invalid':'is-valid')]) }}
    @error('password_confirmation')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


@inject("roles","\App\Models\Role")

<div class="form-group">
    {!! Form::label('role', __("words.role"), ['class' => 'awesome']) !!}
    {{ Form::select('role', $roles->pluck('name','id'), null, ['class' => 'form-control '.($errors->has('role') ? 'is-invalid':'is-valid')]) }}
    @error('role')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
