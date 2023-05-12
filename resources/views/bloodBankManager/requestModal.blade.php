<div class="modal fade" id="approve{{$request->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Blood Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::model($bloodRequests, [ 'method' => 'post','url' => ['bbmanager/approverequest',$request->id] ]) !!}

                {!! Form::hidden('requestid', $request->id) !!}
        
                <div class="mb-3">
                    {!! Form::label('status', 'Ststus') !!}
                    <select name="status" class="form-control" required>
                        <option value="">-- Select --</option>
                        <option value="Approved">Approve</option>
                        <option value="Rejected">Reject</option>
                        <option value="Fulfilled">Fulfilled</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                {{Form::button('<i class="fa fa-check-square-o"></i> Apply', ['class' => 'btn btn-success', 'type' => 'submit'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
