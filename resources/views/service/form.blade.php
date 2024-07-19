<div id="page-loader" class="page-loader" style="display: none;">
    <div class="spinner"></div>
    <div id="loading-text" class="loading-text">Guardando</div>
</div>
<div id="content">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">   {{ Form::label('name') }}</label>
                <div>
                    {{ Form::text('name', $service->name, ['class' => 'form-control' .
                    ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-3">
                <label class="form-label">   {{ Form::label('price') }}</label>
                <div>
                    {{ Form::text('price', $service->price, ['class' => 'form-control' .
                    ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => '$']) }}
                    {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
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
</div>
<style>
.form-control.color-input {
height: calc(1.5em + .75rem + 7px); /* Igual a la altura del campo de texto */
padding: .375rem .75rem; /* Igual al padding del campo de texto */
}
.texto{
font-family: 'Poppins', sans-serif;
}
/* Estilos del Contenedor del Spinner */
#page-loader {
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%;
background-color: rgba(255, 255, 255, 0.808);
display: flex;
flex-direction: column;
justify-content: center;
align-items: center;
z-index: 1000; /* Asegura que esté por encima de otros elementos */
}

/* Estilos del Spinner */
.spinner {
border: 4px solid rgba(255, 255, 255, 0.3);
border-radius: 50%;
border-top: 4px solid #102b5e; /* Puedes ajustar el color según el esquema de colores de tu aplicación */
width: 40px;
height: 40px;
animation: spin 1s linear infinite;
}

/* Animación del Spinner */
@keyframes spin {
0% { transform: rotate(0deg); }
100% { transform: rotate(360deg); }
}

/* Estilos del Texto "Guardando" */
.loading-text {
margin-top: 10px;
}

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
