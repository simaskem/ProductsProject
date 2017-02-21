@extends('layouts.app')
@section('content')
@section('breadcrumbs', Breadcrumbs::render('category.index'))

<br />

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-hover">
                <thead>
                    <tr>                    
                        <th>{{ trans('category.table_column_name_name') }}</th>
                        <th>{{ trans('category.table_column_name_last_save_date') }}</th>
                        <th>{{ trans('category.table_column_name_last_update_date') }}</th>
                        <th class="action">{{ link_to_action('CategoryController@create', '', null, ["class" => "glyphicon glyphicon-plus", 'title' => trans('general.table_action_create')]) }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($categories as $category)
                        <tr>                  
                          <td>{{ $category->name }}</td>
                          <td>{{ $category->created_at }}</td>
                          <td>{{ $category->updated_at }}</td>
                          <td class="action">
                                {{ link_to_action('CategoryController@show', '', ['id' => $category->id], ['id' => 'button_cat_view_'.$category->id, "class" => "glyphicon glyphicon-search", 'title' => trans('general.table_action_show')]) }}
                                {{ link_to_action('CategoryController@edit', '', ['id' => $category->id], ['id' => 'button_cat_edit_'.$category->id, "class" => "glyphicon glyphicon-edit", 'title' => trans('general.table_action_edit')]) }} 
                                {{ link_to_action('CategoryController@showRelatedProducts', '', ['id' => $category->id], ['id' => 'button_cat_show_products_'.$category->id, "class" => "glyphicon glyphicon-list-alt", 'title' => trans('general.table_action_show_related_products')]) }}
                                {!! Form::open(['method' => 'DELETE', 'action' => ['CategoryController@destroy', $category->id], 'style' => 'display:inline']) !!}
                                    <a id='btn_item_delete_{{$category->id}}' class='glyphicon glyphicon-trash' href="#" data-toggle="modal" data-target="#confirmDelete" title="{{ trans('category.lbl_delete_category') }}" onclick="return false;" /> 
                                {!! Form::close() !!}
                          </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class='pull-right'> 
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
@include('dlg.dlg_confirm_delete')