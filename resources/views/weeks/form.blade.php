
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">   {{ Form::label('customer_name') }}</label>
                <div>
                    {{ Form::text('customer_name', $week->customer_name, ['class' => 'form-control texto' .
                    ($errors->has('customer_name') ? ' is-invalid' : ''), 'placeholder' => 'Customer Name']) }}
                    {!! $errors->first('customer_name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">   {{ Form::label('yacht_name') }}</label>
                <div>
                    {{ Form::text('yacht_name', $week->yacht_name, ['class' => 'form-control texto' .
                    ($errors->has('yacht_name') ? ' is-invalid' : ''), 'placeholder' => 'Yacht Name']) }}
                    {!! $errors->first('yacht_name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">   {{ Form::label('location') }}</label>
                <div>
                    {{ Form::text('location', $week->location, ['class' => 'form-control texto' .
                    ($errors->has('location') ? ' is-invalid' : ''), 'placeholder' => 'Location']) }}
                    {!! $errors->first('location', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('date', 'Select Week') }}</label>
                <div>
                    <select name="date" class="form-control form-select">
                        <option value="week1">Week 1</option>
                        <option value="week2">Week 2</option>
                    </select>
                    {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('day', 'Select Day') }}</label>
                <div>
                    <select name="day" class="form-control form-select">
                        <option value="monday">Monday</option>
                        <option value="tuesday">Tuesday</option>
                        <option value="wednesday">Wednesday</option>
                        <option value="thursday">Thursday</option>
                        <option value="friday">Friday</option>
                        <option value="saturday">Saturday</option>
                        <option value="sunday">Sunday</option>
                    </select>
                    {!! $errors->first('day', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('color', 'Color') }}</label>
                <div>
                    <select name="color" class="form-control form-select texto {{ $errors->has('color') ? ' is-invalid' : '' }}">
                        <option value="#ff0000" {{ $week->color == '#ff0000' ? 'selected' : '' }} style="background-color: #ff0000; color: #ffffff;">Red</option>
                        <option value="#00ff00" {{ $week->color == '#00ff00' ? 'selected' : '' }} style="background-color: #00ff00; color: #000000;">Green</option>
                        <option value="#0000ff" {{ $week->color == '#0000ff' ? 'selected' : '' }} style="background-color: #0000ff; color: #ffffff;">Blue</option>
                        <option value="#ffff00" {{ $week->color == '#ffff00' ? 'selected' : '' }} style="background-color: #ffff00; color: #000000;">Yellow</option>
                        <option value="#ff00ff" {{ $week->color == '#ff00ff' ? 'selected' : '' }} style="background-color: #ff00ff; color: #ffffff;">Magenta</option>
                        <option value="#00ffff" {{ $week->color == '#00ffff' ? 'selected' : '' }} style="background-color: #00ffff; color: #000000;">Cyan</option>
                        <option value="#800000" {{ $week->color == '#800000' ? 'selected' : '' }} style="background-color: #800000; color: #ffffff;">Maroon</option>
                        <option value="#808000" {{ $week->color == '#808000' ? 'selected' : '' }} style="background-color: #808000; color: #000000;">Olive</option>
                        <option value="#800080" {{ $week->color == '#800080' ? 'selected' : '' }} style="background-color: #800080; color: #ffffff;">Purple</option>
                        <option value="#008080" {{ $week->color == '#008080' ? 'selected' : '' }} style="background-color: #008080; color: #ffffff;">Teal</option>
                        <option value="#000080" {{ $week->color == '#000080' ? 'selected' : '' }} style="background-color: #000080; color: #ffffff;">Navy</option>
                        <option value="#ffa500" {{ $week->color == '#ffa500' ? 'selected' : '' }} style="background-color: #ffa500; color: #000000;">Orange</option>
                        <option value="#ffc0cb" {{ $week->color == '#ffc0cb' ? 'selected' : '' }} style="background-color: #ffc0cb; color: #000000;">Pink</option>
                        <option value="#a52a2a" {{ $week->color == '#a52a2a' ? 'selected' : '' }} style="background-color: #a52a2a; color: #ffffff;">Brown</option>
                        <option value="#808080" {{ $week->color == '#808080' ? 'selected' : '' }} style="background-color: #808080; color: #000000;">Gray</option>
                        <option value="#ffffff" {{ $week->color == '#ffffff' ? 'selected' : '' }} style="background-color: #ffffff; color: #000000;">White</option>
                        <option value="#000000" {{ $week->color == '#000000' ? 'selected' : '' }} style="background-color: #000000; color: #ffffff;">Black</option>
                    </select>
                    {!! $errors->first('color', '<div class="invalid-feedback">:message</div>') !!}
                </div>
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

<script>
    function submitForm() {
        // Mostrar el Spinner y el texto "Guardando"
        showSpinner();
        document.getElementById('your-form-id').submit();
    }

    // Mostrar el Spinner y el texto "Guardando"
    function showSpinner() {
        document.getElementById('page-loader').style.display = 'flex';
        document.getElementById('loading-text').innerText = 'Guardando';
    }

    // Ocultar el Spinner y el texto "Guardando"
    function hideSpinner() {
        document.getElementById('page-loader').style.display = 'none';
        document.getElementById('loading-text').innerText = '';
    }
</script>

