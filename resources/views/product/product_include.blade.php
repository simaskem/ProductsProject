<div class="row">
    <div class="col-xs-6">
        <div class="form-group">
                {!! Form::label('name', trans('product.form_input_name')) !!}
                {!! Form::text('name', !empty($product->name) ? $product->name : old('name'), ['class' => ($errors->has('name')) ? 'form-control invalid-field' : 'form-control', $mode == Cnst::mode_show ? 'readonly' : '']) !!}
                @include('errors.validation_errors', ['field' => 'name'])
        </div>
    </div>
    
    <div class="col-xs-6">
        <div class="form-group">
                {!! Form::label('amount', trans('product.form_input_amount')) !!}
                {!! Form::text('amount', !empty($product->amount) ? $product->amount : old('amount'), ['class' => ($errors->has('amount')) ? 'form-control invalid-field' : 'form-control', $mode == Cnst::mode_show ? 'readonly' : '']) !!}
                @include('errors.validation_errors', ['field' => 'amount'])
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-6">
        <div class="form-group">
                {!! Form::label('price', trans('product.form_input_price')) !!}
                {!! Form::text('price', !empty($product->price) ? $product->price : old('price'), ['class' => ($errors->has('price')) ? 'form-control invalid-field' : 'form-control', $mode == Cnst::mode_show ? 'readonly' : '', 'placeholder' => 'Example: 1,51']) !!}
                @include('errors.validation_errors', ['field' => 'price'])
        </div>
    </div>
    
    <div class="col-xs-6">
        <div class="form-group">
                {!! Form::label('category_id', trans('product.form_input_category')) !!}
                @if($mode != Cnst::mode_show)
                    {!! Form::select('category_id', $categories, !empty($product->category_id) ? $product->category_id : '', ['class' => ($errors->has('category_id')) ? 'form-control invalid-field' : 'form-control']) !!}
                    @include('errors.validation_errors', ['field' => 'category_id'])
                @else
                    {!! Form::text('category_id', !empty($product->category_id) ? $product->category->name : '', ['class' => 'form-control', 'readonly']) !!}
                @endif                
        </div>
    </div>
</div>