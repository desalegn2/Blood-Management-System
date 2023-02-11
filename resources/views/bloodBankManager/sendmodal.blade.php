<div class="modal fade" id="sendmessage{{$donor->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">distribute Blood</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::model($data, [ 'method' => 'post','url' => ['bbmanager/sendresult',$donor->id] ]) !!}


                <div class="mb-3">
                    {!! Form::label('greeting', 'Greating') !!}
                    {!! Form::text('greeting','ውድ ደም ለጋሻችን ',array('class' => 'field required',
                    'placeholder' => ''))!!}
                </div>

                <div class="mb-3">
                    {!! Form::label('body', 'Body') !!}
                    {!! Form::text('body', 'በ', ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('acttext', 'acttext') !!}
                    {!! Form::text('acttext',$donor->created_at, ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('actionurl', 'url') !!}
                    {!! Form::text('actionurl', 'የለገሱት የደም አይነት ውጤት ነው', ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('lastline', 'LastLine') !!}
                    {!! Form::text('lastline','Bahir Dar Blood Bank', ['class' => 'form-control']) !!}
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