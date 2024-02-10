<div class="form-group">
    {!! Form::label('title_ar', __("words.title ar"), ['class' => 'awesome']) !!}

    {{ Form::text('title_ar', null, ['class' => 'form-control '.($errors->has('title_ar') ? 'is-invalid':'is-valid')]) }}
    @error('title_ar')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('title_en', __("words.title en"), ['class' => 'awesome']) !!}
    {{ Form::text('title_en', null, ['class' => 'form-control '.($errors->has('title_en') ? 'is-invalid':'is-valid')]) }}
    @error('title_en')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>



<div class="form-group">
    {!! Form::label('description_en', __("words.description en"), ['class' => 'awesome']) !!}
    {{ Form::textarea('description_en', null, ['class' => 'form-control '.($errors->has('description_en') ? 'is-invalid':'is-valid')]) }}
    @error('description_en')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>




<div class="form-group">
    {!! Form::label('description_ar', __("words.description en"), ['class' => 'awesome']) !!}
    {{ Form::textarea('description_ar', null, ['class' => 'form-control '.($errors->has('description_ar') ? 'is-invalid':'is-valid')]) }}
    @error('description_ar')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('media', __("words.image"), ['class' => 'awesome']) !!}
    {!! Form::file('media',['class' => 'form-control '.($errors->has('media') ? 'is-invalid':'is-valid')]) !!}
    @error('media')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
