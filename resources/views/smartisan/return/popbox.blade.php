<!-- Modal -->
<div class="modal fade" id="myModalNew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">添加新记录</h4>
      </div>
      <div class="modal-body">
        @include('smartisan.return.form')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">
          关闭
        </button>
        <button type="button" class="btn btn-success" v-on:click="addReturn">
          保存
        </button>
      </div>
    </div>
  </div>
</div>