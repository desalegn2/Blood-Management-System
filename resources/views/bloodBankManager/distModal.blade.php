<!-- Edit Modal -->
<div class="modal fade" id="distribute{{$stock->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Distribute Blood</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::model($data, [ 'method' => 'post','url' => ['bbmanager/distribute',$stock->id] ]) !!}

                {!! Form::hidden('stockid', $stock->id) !!}
                <div class="mb-3">
                    {!! Form::label('packno', 'Pack NO') !!}
                    {!! Form::text('packno', $stock->packno, ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('bloodgroup', 'Blood group') !!}
                    {!! Form::text('bloodtype', $stock->bloodgroup, ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('volume', 'Volume') !!}
                    {!! Form::text('volume', $stock->volume, ['class' => 'form-control']) !!}
                </div>

                <div class="mb-3">
                    {!! Form::label('rh', 'Rh') !!}
                    {!! Form::text('rh', $stock->rh, ['class' => 'form-control']) !!}
                </div>

                <div class="mb-3">
                    {!! Form::label('expirydate', 'Expiry Date') !!}
                    {!! Form::text('expitariondate', $stock->expitariondate, ['class' => 'form-control','readonly']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('recievedby', 'Received By') !!}
                    <select name="hospitalid" class="form-control">
                        <option value="">-- Select Hospital --</option>
                        @foreach ($hospital as $h)
                        <option value="{{$h->hospital_id}}">{{$h->hospitalname}}</option>
                        @endforeach
                        <!-- add more options as needed -->
                    </select>
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
<div class="modal fade" id="delete{{$stock->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Delete Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::model($data, [ 'method' => 'delete','url' => ['admin/deletedonor', $stock->id] ]) !!}
                <h4 class="text-center">Are you sure you want to delete This Data?</h4>
                <h5 class="text-center">Name: {{$stock->name}} {{$stock->email}}</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                {{Form::button('<i class="fa fa-trash"></i> Delete', ['class' => 'btn btn-danger', 'type' => 'submit'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>