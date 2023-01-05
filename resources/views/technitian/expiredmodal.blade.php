<!-- Edit Modal -->
<div class="modal fade" id="setexpaired{{$bloods->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Manage Donor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::model($blood, [ 'method' => 'post','url' => ['technitian/filldiscard'] ]) !!}
                <div class="mb-3">
                    {!! Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('bloodgroup', 'Blood group') !!}
                    {!! Form::text('bloodgroup', $bloods->bloodgroup, ['class' => 'form-control']) !!}
                </div>

                <div class="mb-3">
                    {!! Form::label('unitdiscarded ', 'Volume') !!}
                    {!! Form::text('unitdiscarded ', $bloods->volume, ['class' => 'form-control']) !!}
                </div>

                <div class="mb-3">
                    {!! Form::label('Reason', 'Reason of Discard') !!}
                    {!! Form::textarea('centerid', '', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                {{Form::button('<i class="fa fa-check-square-o"></i> Distrinute', ['class' => 'btn btn-success', 'type' => 'Discard'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="delete{{$bloods->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Delete Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::model($blood, [ 'method' => 'delete','url' => ['admin/deletedonor', $bloods->id] ]) !!}
                <h4 class="text-center">Are you sure you want to delete This Data?</h4>
                <h5 class="text-center">Name: {{$bloods->name}} {{$bloods->email}}</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                {{Form::button('<i class="fa fa-trash"></i> Delete', ['class' => 'btn btn-danger', 'type' => 'submit'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>