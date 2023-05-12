<div class="modal fade" id="transfer{{$dist->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Distribute Blood</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::model($distributes, [ 'method' => 'post','url' => ['doctor/transfusion',$dist->id] ]) !!}
                {!! Form::hidden('stockid', $dist->id) !!}
                {!! Form::hidden('doctor_id', Auth::user()->id) !!}

                <div class="mb-3">
                    {!! Form::label('pid', 'patient ID Number') !!}
                    {!! Form::text('pid', '', ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('firstname', 'patient First Name') !!}
                    {!! Form::text('firstname', '', ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('lastname', 'patient Last Name') !!}
                    {!! Form::text('lastname', '', ['class' => 'form-control']) !!}
                </div>

                <div class="mb-3">
                    {!! Form::label('gender', 'Gendor') !!}
                    {!! Form::text('gender', '', ['class' => 'form-control']) !!}
                </div>

                <div class="mb-3">
                    {!! Form::label('phone', 'Phone') !!}
                    {!! Form::text('phone', '', ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('photo', 'Photo') !!}
                    {!! Form::file('photo', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                {{Form::button('<i class="fa fa-check-square-o"></i> Transfer', ['class' => 'btn btn-success', 'type' => 'submit'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>