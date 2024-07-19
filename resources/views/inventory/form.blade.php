    <div class="row">
        <div class="col-md-2">
            <div class="form-group mb-3">
                <label class="form-label">   {{ Form::label('date') }}</label>
                <div>
                    {{ Form::date('date', $product->date, ['class' => 'form-control texto' .
                    ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Date']) }}
                    {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-3">
                <label class="form-label">   {{ Form::label('name') }}</label>
                <div>
                    {{ Form::text('name', $product->name, ['class' => 'form-control texto' .
                    ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-3">
                <label class="form-label">   {{ Form::label('supplier') }}</label>
                <div>
                    {{ Form::text('supplier', $product->supplier, ['class' => 'form-control texto' .
                    ($errors->has('supplier') ? ' is-invalid' : ''), 'placeholder' => 'Supplier']) }}
                    {!! $errors->first('supplier', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-3">
                <label class="form-label">   {{ Form::label('amount') }}</label>
                <div>
                    {{ Form::text('amount', $product->amount, ['class' => 'form-control texto' .
                    ($errors->has('amount') ? ' is-invalid' : ''), 'placeholder' => '$']) }}
                    {!! $errors->first('amount', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group mb-3">
                <label class="form-label">   {{ Form::label('description') }}</label>
                <div>
                    {{ Form::textarea('description', $product->description, ['class' => 'form-control h-7 texto' .
                    ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
                    {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="form-footer">
            <div class="text-end">
                <div class="d-flex">
                    <button type="reset" href="#" class="btn btn-secondary texto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-rotate-clockwise-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 4.55a8 8 0 0 1 6 14.9m0 -4.45v5h5" /><path d="M5.63 7.16l0 .01" /><path d="M4.06 11l0 .01" /><path d="M4.63 15.1l0 .01" /><path d="M7.16 18.37l0 .01" /><path d="M11 19.94l0 .01" /></svg>
                        Clean
                    </button>
                    <button type="submit" class="btn btn-primary ms-auto ajax-submit texto" onclick="submitForm()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tada icon-tabler icon-tabler-pencil-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /><path d="M15 19l2 2l4 -4" /></svg>
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
    <style>
        *{
        font-family: 'Poppins', sans-serif;
    }
    .texto{
        font-family: 'Poppins', sans-serif;
    }
    .tom-select{
        background-color: #ffffff;
        color: #000000;
    }
    </style>
<script>
function submitForm() {
    showSpinner();
    document.getElementById('your-form-id').submit();
}

function showSpinner() {
    document.getElementById('page-loader').style.display = 'flex';
    document.getElementById('loading-text').innerText = 'Guardando';
}

function hideSpinner() {
    document.getElementById('page-loader').style.display = 'none';
    document.getElementById('loading-text').innerText = '';
}
</script>
