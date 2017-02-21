@extends('layouts.app')
@section('content')
@section('breadcrumbs', Breadcrumbs::render('product.index'))

<br />

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-hover">
                <thead>
                    <tr>                    
                        <th>{{ trans('product.table_column_name') }}</th>
                        <th>{{ trans('product.table_column_amount') }}</th>
                        <th>{{ trans('product.table_column_price') }}</th>
                        <th>{{ trans('product.table_column_category') }}</th>                      
                        <th class="action">{{ link_to_action('ProductController@create', '', null, ["class" => "glyphicon glyphicon-plus", 'title' => trans('general.table_action_create')]) }}</th>                        
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $product)
                        <tr>                  
                          <td>{{ $product->name }}</td>
                          <td>{{ $product->amount }}</td>
                          <td>{{ $product->price }}</td>
                          <td>{{ $product->category->name }}</td>                          
                        <td class="action">
                            {{ link_to_action('ProductController@show', '', ['id' => $product->id], ['id' => 'button_cat_view_'.$product->id, "class" => "glyphicon glyphicon-search", 'title' => trans('general.table_action_show')]) }}
                            {{ link_to_action('ProductController@edit', '', ['id' => $product->id], ['id' => 'button_cat_edit_'.$product->id, "class" => "glyphicon glyphicon-edit", 'title' => trans('general.table_action_edit')]) }}                                
                            {!! Form::open(['method' => 'DELETE', 'action' => ['ProductController@destroy', $product->id], 'style' => 'display:inline']) !!}
                                <a id='btn_item_delete_{{$product->id}}' class='glyphicon glyphicon-trash' href="#" data-toggle="modal" data-target="#confirmDelete" title="{{ trans('general.table_action_delete') }}" onclick="return false;" /> 
                            {!! Form::close() !!}
                        </td>                          
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class='pull-right'>                
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>



@endsection
@include('dlg.dlg_confirm_delete')

