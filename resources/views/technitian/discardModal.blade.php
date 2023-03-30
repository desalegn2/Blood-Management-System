<!-- Discard Modal -->
<div class="modal fade" id="discard{{$bloods->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Discard Expired</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::model($blood, [ 'method' => 'delete','url' => ['admin/deletedonor', $bloods->id] ]) !!}
                <h4 class="text-center">Are you sure you want to discard This Pack?</h4>
                <h5 class="text-center">Pack No: {{$bloods->packno}} And Volume: {{$bloods->volume}}</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                {{Form::button('<i class="fa fa-trash"></i> Delete', ['class' => 'btn btn-danger', 'type' => 'submit'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>