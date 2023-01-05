<!-- Edit Modal -->
<div class="modal fade" id="edit{{$view->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Manage Health Institution</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::model($views, [ 'method' => 'post','url' => ['admin/sendb', $view->id] ]) !!}
                <div class="mb-3">
                    {!! Form::label('hospitalname', 'Hospitalname') !!}
                    {!! Form::text('hospitalname', $view->hospitalname, ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('email', 'Lastname') !!}
                    {!! Form::text('email', $view->email, ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('bloodgroup', 'Bloodgroup') !!}
                    {!! Form::text('bloodgroup', $view->bloodgroup, ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('volume', 'Volume') !!}
                    {!! Form::text('volume', $view->volume, ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">

                    {!! Form::hidden('phone', $view->phone, ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">

                    {!! Form::hidden('date', $view->date, ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">

                    {!! Form::hidden('reason', $view->reason, ['class' => 'form-control']) !!}
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                {{Form::button('<i class="fa fa-check-square-o"></i> Send', ['class' => 'btn btn-success', 'type' => 'submit'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="delete{{$view->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Delete Health Institution</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::model($views, [ 'method' => 'delete','url' => ['admin/deletehi', $view->id] ]) !!}
                <h4 class="text-center">Are you sure you want to delete This Data?</h4>
                <h5 class="text-center">Name: {{$view->hospitalname}} {{$view->email}}</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                {{Form::button('<i class="fa fa-trash"></i> Delete', ['class' => 'btn btn-danger', 'type' => 'submit'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>