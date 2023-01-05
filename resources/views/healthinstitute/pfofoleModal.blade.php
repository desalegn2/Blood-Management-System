<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="modal fade" id="profile" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Edit Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! Form::model([ 'method' => 'post']) !!}
                    <div class="mb-3">
                        {!! Form::label('firstname', 'Firstname') !!}
                        {!! Form::text('firstname','Lastname', ['class' => 'form-control']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('lastname', 'Lastname') !!}
                        {!! Form::text('lastname','Lastname',['class' => 'form-control']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('firstname', 'Firstname') !!}
                        {!! Form::text('firstname','Lastname', ['class' => 'form-control']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('lastname', 'Lastname') !!}
                        {!! Form::text('lastname','Lastname',['class' => 'form-control']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('firstname', 'Firstname') !!}
                        {!! Form::text('firstname','Lastname', ['class' => 'form-control']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('lastname', 'Lastname') !!}
                        {!! Form::text('lastname','Lastname',['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    {{Form::button('<i class="fa fa-check-square-o"></i> Update', ['class' => 'btn btn-success', 'type' => 'submit'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</body>

</html>