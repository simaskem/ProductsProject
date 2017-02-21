<div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">{{ trans('general.ConfirmDeleteMessageTitle') }}</h4>
      </div>
      <div class="modal-body">
        <p>{!! trans('general.ConfirmDeleteGeneral') !!}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="btn_cancel" data-dismiss="modal">{{ trans('general.btn_cancel') }}</button>
        <button type="button" class="btn btn-danger" id="btn_confirm">{{ trans('general.btn_delete') }}</button>
      </div>
    </div>
  </div>
</div>
