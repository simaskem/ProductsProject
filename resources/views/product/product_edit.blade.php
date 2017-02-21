@extends('layouts.app')
@section('content')
@section('breadcrumbs', Breadcrumbs::render('product.edit', $product))

<br />
{!! Form::model($product, [
    'method' => 'PATCH',
    'route' => ['product.update', $product->id]
]) !!}
    <div class="container">
        <div class="row">
            <div class="col-lg-12">            
                <div class="panel panel-primary" style="overflow:auto;">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            {{ trans('product.lbl_edit_product') }}
                        </h3>
                    </div>
                    <div class="panel-body">
                        @include('product.product_include', ['mode' => Cnst::mode_edit])
                    </div>
                </div>            
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">            
                {!! Form::submit(trans('general.btn_update'), ['id' => 'btn_update', 'class' => 'btn btn-primary pull-right']) !!}           
                {!! link_to_action('ProductController@index', trans('general.btn_back'), null, array("id" => "btn_back", "class" => "btn btn-default") ) !!}           
            </div>
        </div> 
    </div>
{!! Form::close() !!}


@endsection
