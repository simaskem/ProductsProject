@extends('layouts.app')
@section('content')
@section('breadcrumbs', Breadcrumbs::render('product.show', $product))

<br />
{!! Form::model($product,['route' => ['product.show', $product->id]]) !!}
    <div class="container">
        <div class="row">
            <div class="col-lg-12">            
                <div class="panel panel-primary" style="overflow:auto;">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            {{ trans('product.lbl_view_product') }}
                        </h3>
                    </div>
                    <div class="panel-body">
                        @include('product.product_include', ['mode' => Cnst::mode_show])
                    </div>
                </div>            
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12"> 
                {!! link_to_action('ProductController@index', trans('general.btn_back'), null, array("id" => "btn_back", "class" => "btn btn-default") ) !!}           
            </div>
        </div> 
    </div>
{!! Form::close() !!}


@endsection
