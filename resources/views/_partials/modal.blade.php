<script type="text/javascript">

   jQuery(document).ready(function() {

        var draftBtn = '<a class="btn btn-default pull-left" id="draftAllCTRL" style="margin-right: 8px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Draft</a>';

        var trashBtn = '<a class="btn btn-default pull-left" id="trashAllCTRL" style="margin-right: 8px;"><i class="fa fa-trash-o" aria-hidden="true"></i> Trash</a>';

        var restoreBtn = '<a class="btn btn-default pull-left" id="restoreAllCTRL" style="margin-right: 8px;"><i class="fa fa-undo" aria-hidden="true"></i> Restore</a>';

        var deleteBtn = '<a class="btn btn-default pull-left" id="deleteAllCTRL" style="margin-right: 8px;"><i class="fa fa-times-circle" aria-hidden="true"></i> Permanent Delete</a>';

        var publishBtn = '<a class="btn btn-default pull-left" id="publishAllCTRL" style="margin-right: 8px;"><i class="fa fa-globe" aria-hidden="true"></i> Publish</a>';

        @if(request()->has('status') && intval(request()->status) == 0 )
        
            $(trashBtn).insertBefore('.dataTables_length');
            $(publishBtn).insertBefore('.dataTables_length');

        @elseif(request()->has('status') && intval(request()->status) == 3 )
        
            $(restoreBtn).insertBefore('.dataTables_length');
            $(deleteBtn).insertBefore('.dataTables_length');
        
        @else
            $(draftBtn).insertBefore('.dataTables_length');
            $(trashBtn).insertBefore('.dataTables_length');
        @endif

        $("#selectAll").click(function() {
            $("input[name=ids\\[\\]]").trigger('click');
        });

        $(document).on("click","a.trashCTRL",function(){

            var trashFormAction = trashUrl + "/" + $(this).attr("data-id");
            $("#trashForm").attr("action",trashFormAction);
            
            $('#trash_confirmation_modal').modal('show');

            return false;

        });
        $(document).on("click","a.deleteCTRL",function(){

            var deleteFormAction = deleteUrl + "/" + $(this).attr("data-id");
            $("#deleteForm").attr("action",deleteFormAction);
            
            $('#delete_confirmation_modal').modal('show');

            return false;

        });
        $(document).on("click","a.restoreCTRL",function(){

            var restoreFormAction = restoreUrl + "/" + $(this).attr("data-id");
            $("#restoreform").attr("action",restoreFormAction);
            
            $('#restore_confirmation_modal').modal('show');

            return false;

        });

        $(document).on("click","a.trashAllCTRL, a#trashAllCTRL",function(){
            var checkedItems = $("input[name=ids\\[\\]]:checked");
            if(checkedItems.length < 1){
                alert('Please check one or more item');
                return false;
            }
            checkedItems.each(function(i, elm) {
                $("#trashAllForm").append('<input type="hidden" name="ids[]" value="'+ $(this).val() +'">');
            });
          
            var trashAllFormAction = trashUrl + "/All";
            $("#trashAllForm").attr("action",trashAllFormAction);
            
            $('#trash_all_confirmation_modal').modal('show');

            return false;

        });
        $(document).on("click","a.draftAllCTRL, a#draftAllCTRL",function(){
            var checkedItems = $("input[name=ids\\[\\]]:checked");
            if(checkedItems.length < 1){
                alert('Please check one or more item');
                return false;
            }
            checkedItems.each(function(i, elm) {
                $("#draftAllForm").append('<input type="hidden" name="ids[]" value="'+ $(this).val() +'">');
            });
          
            var draftAllFormAction = draftUrl + "/All";
            $("#draftAllForm").attr("action",draftAllFormAction);
            
            $('#draft_all_confirmation_modal').modal('show');

            return false;

        });
        $(document).on("click","a.publishAllCTRL, a#publishAllCTRL",function(){
            var checkedItems = $("input[name=ids\\[\\]]:checked");
            if(checkedItems.length < 1){
                alert('Please check one or more item');
                return false;
            }
            checkedItems.each(function(i, elm) {
                $("#publishAllForm").append('<input type="hidden" name="ids[]" value="'+ $(this).val() +'">');
            });
          
            var publishAllFormAction = publishUrl + "/All";
            $("#publishAllForm").attr("action",publishAllFormAction);
            
            $('#publish_all_confirmation_modal').modal('show');

            return false;

        });
        $(document).on("click","a.restoreAllCTRL, a#restoreAllCTRL",function(){
            var checkedItems = $("input[name=ids\\[\\]]:checked");
            if(checkedItems.length < 1){
                alert('Please check one or more item');
                return false;
            }
            checkedItems.each(function(i, elm) {
                $("#restoreAllForm").append('<input type="hidden" name="ids[]" value="'+ $(this).val() +'">');
            });
          
            var restoreAllFormAction = restoreUrl + "/All";
            $("#restoreAllForm").attr("action",restoreAllFormAction);
            
            $('#restore_all_confirmation_modal').modal('show');

            return false;

        });
        $(document).on("click","a.deleteAllCTRL, a#deleteAllCTRL",function(){
            var checkedItems = $("input[name=ids\\[\\]]:checked");
            if(checkedItems.length < 1){
                alert('Please check one or more item');
                return false;
            }
            checkedItems.each(function(i, elm) {
                $("#deleteAllForm").append('<input type="hidden" name="ids[]" value="'+ $(this).val() +'">');
            });
          
            var deleteAllFormAction = deleteUrl + "/All";
            $("#deleteAllForm").attr("action",deleteAllFormAction);
            
            $('#delete_all_confirmation_modal').modal('show');

            return false;

        });
   });
</script>
<div class="modal fade" id="delete_all_confirmation_modal" role="dialog" style="display: none;">
    <div class="modal-dialog" style="margin-top: 260.5px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Are you sure you want to delete all the checked post ? There is no coming back!</h4>
            </div>
            
            {{ Form::open(array('url' => '/', 'id' => 'deleteAllForm', 'action' => '', 'method' => 'DELETE')) }}            
       
                <input type="hidden" name="_method" value="DELETE">
                {{ Form::token() }}
                <div class="modal-footer">
                    {!! Form::submit('Yes', ['class' => 'btn btn-danger']) !!}
                    <button type="button" class="btn btn-primary" data-dismiss="modal">No
                    </button>
                </div>
           {{ Form::close() }}
        </div>

    </div>
</div>
<div class="modal fade" id="restore_all_confirmation_modal" role="dialog" style="display: none;">
    <div class="modal-dialog" style="margin-top: 260.5px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Are you sure you want to restore all the checked post ?</h4>
            </div>

            <form id="restoreAllForm" method="POST" action="">
            <input type="hidden" name="_method" value="POST">
            {{ Form::token() }}
            <div class="modal-footer">
                {!! Form::submit('Yes', ['class' => 'btn btn-danger']) !!}
                <button type="button" class="btn btn-primary" data-dismiss="modal">No
                </button>
            </div>
           </form>
        </div>

    </div>
</div>
<div class="modal fade" id="publish_all_confirmation_modal" role="dialog" style="display: none;">
    <div class="modal-dialog" style="margin-top: 260.5px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Are you sure you want to publish all the checked post ?</h4>
            </div>

            <form id="publishAllForm" method="POST" action="">
            <input type="hidden" name="_method" value="POST">
            {{ Form::token() }}
            <div class="modal-footer">
                {!! Form::submit('Yes', ['class' => 'btn btn-danger']) !!}
                <button type="button" class="btn btn-primary" data-dismiss="modal">No
                </button>
            </div>
           </form>
        </div>

    </div>
</div>
<div class="modal fade" id="draft_all_confirmation_modal" role="dialog" style="display: none;">
    <div class="modal-dialog" style="margin-top: 260.5px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Are you sure you want to draft all the checked post ?</h4>
            </div>

            <form id="draftAllForm" method="POST" action="">
            <input type="hidden" name="_method" value="POST">
            {{ Form::token() }}
            <div class="modal-footer">
                {!! Form::submit('Yes', ['class' => 'btn btn-danger']) !!}
                <button type="button" class="btn btn-primary" data-dismiss="modal">No
                </button>
            </div>
           </form>
        </div>

    </div>
</div>
<div class="modal fade" id="trash_all_confirmation_modal" role="dialog" style="display: none;">
    <div class="modal-dialog" style="margin-top: 260.5px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Are you sure you want to trash all the checked post ?</h4>
            </div>

            <form id="trashAllForm" method="POST" action="">
            <input type="hidden" name="_method" value="POST">
            {{ Form::token() }}
            <div class="modal-footer">
                {!! Form::submit('Yes', ['class' => 'btn btn-danger']) !!}
                <button type="button" class="btn btn-primary" data-dismiss="modal">No
                </button>
            </div>
           </form>
        </div>

    </div>
</div>
<div class="modal fade" id="trash_confirmation_modal" role="dialog" style="display: none;">
    <div class="modal-dialog" style="margin-top: 260.5px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Are you sure you want to delete ?</h4>
            </div>

            <form id="trashForm" method="POST" action="">
            <input type="hidden" name="_method" value="POST">
            {{ Form::token() }}
            <div class="modal-footer">
                {!! Form::submit('Yes', ['class' => 'btn btn-danger']) !!}
                <button type="button" class="btn btn-primary" data-dismiss="modal">No
                </button>
            </div>
           </form>
        </div>

    </div>
</div>
<div class="modal fade" id="delete_confirmation_modal" role="dialog" style="display: none;">
    <div class="modal-dialog" style="margin-top: 260.5px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Are you sure you want to delete this post ? There is no coming back!</h4>
            </div>
            
            {{ Form::open(array('url' => '/', 'id' => 'deleteForm', 'action' => '', 'method' => 'DELETE')) }}            
       
                <input type="hidden" name="_method" value="DELETE">
                {{ Form::token() }}
                <div class="modal-footer">
                    {!! Form::submit('Yes', ['class' => 'btn btn-danger']) !!}
                    <button type="button" class="btn btn-primary" data-dismiss="modal">No
                    </button>
                </div>
           {{ Form::close() }}
        </div>

    </div>
</div>
<div class="modal fade" id="restore_confirmation_modal" role="dialog" style="display: none;">
    <div class="modal-dialog" style="margin-top: 260.5px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Are you sure you want to restore this post ?</h4>
            </div>

            <form id="restoreform" method="POST" action="">
            <input type="hidden" name="_method" value="POST">
            {{ Form::token() }}
            <div class="modal-footer">
                {!! Form::submit('Yes', ['class' => 'btn btn-danger']) !!}
                <button type="button" class="btn btn-primary" data-dismiss="modal">No
                </button>
            </div>
           </form>
        </div>

    </div>
</div>