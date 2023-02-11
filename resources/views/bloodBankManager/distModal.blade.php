<!-- Edit Modal -->
<div class="modal fade" id="distribute{{$dis->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">distribute Blood</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::model($data, [ 'method' => 'post','url' => ['bbmanager/distribute'] ]) !!}
                <div class="mb-3">
                    {!! Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) !!}
                    {!! Form::hidden('fullname', $dis->fullname, ['class' => 'form-control']) !!}
                    {!! Form::hidden('email', $dis->email, ['class' => 'form-control']) !!}
                    {!! Form::hidden('phone', $dis->phone, ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('packno', 'Pack NO') !!}
                    {!! Form::text('packno', $dis->packno, ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('bloodgroup', 'Blood group') !!}
                    {!! Form::text('bloodtype', $dis->bloodgroup, ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('volume', 'Volume') !!}
                    {!! Form::text('volume', $dis->volume, ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('bloodpressure', 'Blood Pressure') !!}
                    {!! Form::text('bloodpressure', $dis->bloodpressure, ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('rh', 'Rh') !!}
                    {!! Form::text('rh', $dis->rh, ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('hct', 'Hct') !!}
                    {!! Form::text('hct', $dis->hct, ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('issueddate', 'Issued date') !!}
                    {!! Form::date('issuedate', $dis->date, ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('expirydate', 'Expiry date') !!}
                    {!! Form::date('expirydate', $dis->expirydate, ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('recievedby', 'Recieved By') !!}
                    {!! Form::text('centerid', '', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                {{Form::button('<i class="fa fa-check-square-o"></i> Distrinute', ['class' => 'btn btn-success', 'type' => 'submit'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="delete{{$dis->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Delete Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::model($data, [ 'method' => 'delete','url' => ['admin/deletedonor', $dis->id] ]) !!}
                <h4 class="text-center">Are you sure you want to delete This Data?</h4>
                <h5 class="text-center">Name: {{$dis->name}} {{$dis->email}}</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                {{Form::button('<i class="fa fa-trash"></i> Delete', ['class' => 'btn btn-danger', 'type' => 'submit'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>