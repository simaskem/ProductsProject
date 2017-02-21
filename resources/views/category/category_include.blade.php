<div class="row">
    <div class="col-xs-4">
        <div class="form-group">
                {!! Form::label('name', trans('category.form_input_name')) !!}
                {!! Form::text('name', !empty($category->name) ? $category->name : old('name'), ['class' => ($errors->has('name')) ? 'form-control invalid-field' : 'form-control', $mode == Cnst::mode_show ? 'readonly' : '']) !!}
                @include('errors.validation_errors', ['field' => 'name'])
        </div>
    </div>
</div>