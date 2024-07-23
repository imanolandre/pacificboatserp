<div id="full-page-loader" class="full-page-loader">
    <!-- Puedes ajustar la clase según la implementación de spinners de Tabler.io -->
    <div class="spinner"></div>
</div>
<div id="content">
@extends('tablar::page')

@section('title')
    Weeks
@endsection

@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        List
                    </div>
                    <h2 class="page-title">
                        {{ __('Week ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('weeks.create') }}" class="btn btn-primary d-none d-sm-inline-block texto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-pulse" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            Create
                        </a>
                        <a href="{{ route('weeks.create') }}" class="btn btn-primary d-sm-none btn-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-pulse" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        @php
            function getContrastColor($hexColor) {
                $r = hexdec(substr($hexColor, 1, 2));
                $g = hexdec(substr($hexColor, 3, 2));
                $b = hexdec(substr($hexColor, 5, 2));
                $luminance = (0.299 * $r + 0.587 * $g + 0.114 * $b) / 255;
                return $luminance > 0.5 ? '#000000' : '#FFFFFF';
            }
        @endphp
        <div class="container-xl">
            @if(config('tablar','display_alert'))
                @include('tablar::common.alert')
            @endif

            <!-- Main Tabs for Weeks -->
            <ul class="nav nav-tabs" id="weekTabs" role="tablist">
                @foreach($groupedWeeks as $week => $weeks)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link @if($loop->first) active @endif" id="week{{ $week }}-tab" data-bs-toggle="tab" href="#week{{ $week }}" role="tab" aria-controls="week{{ $week }}" aria-selected="true">
                            {{ ucfirst($week) }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <div class="tab-content" id="weekTabsContent">
                @foreach($groupedWeeks as $week => $weeks)
                    <div class="tab-pane fade @if($loop->first) show active @endif" id="week{{ $week }}" role="tabpanel" aria-labelledby="week{{ $week }}-tab">
                        <!-- Tabs for days of the week -->
                        <ul class="nav nav-tabs" id="dayTabs{{ $week }}" role="tablist">
                            @foreach($daysOfWeek as $day)
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link @if($loop->first) active @endif" id="day{{ $week }}-{{ $day }}-tab" data-bs-toggle="tab" href="#day{{ $week }}-{{ $day }}" role="tab" aria-controls="day{{ $week }}-{{ $day }}" aria-selected="true">
                                        {{ ucfirst($day) }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <div class="tab-content" id="dayTabsContent{{ $week }}">
                            @foreach($daysOfWeek as $day)
                                <div class="tab-pane fade @if($loop->first) show active @endif" id="day{{ $week }}-{{ $day }}" role="tabpanel" aria-labelledby="day{{ $week }}-{{ $day }}-tab">
                                    <table class="table table-vcenter datatable">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Customer Name</th>
                                                <th>Yacht Name</th>
                                                <th>Location</th>
                                                <th>Week</th>
                                                <th>Day</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($weeks->filter(function ($value, $key) use ($day) { return $value->day === strtolower($day); }) as $index => $week)
                                                <tr style="background-color: {{ $week->color }}; color: {{ getContrastColor($week->color) }}">
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $week->customer_name }}</td>
                                                    <td>{{ $week->yacht_name }}</td>
                                                    <td>{{ $week->location }}</td>
                                                    <td>{{ $week->date }}</td>
                                                    <td>{{ $week->day }}</td>
                                                    <td>
                                                        <div class="btn-list flex-nowrap">
                                                            <div class="dropdown">
                                                                <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                                                                    Actions
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <a class="dropdown-item" href="{{ route('weeks.show', $week->id) }}">View</a>
                                                                    <a class="dropdown-item" href="{{ route('weeks.edit', $week->id) }}">Edit</a>
                                                                    <form action="{{ route('weeks.destroy', $week->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" onclick="if(!confirm('Do you Want to Proceed?')){return false;}" class="dropdown-item text-red">
                                                                            Delete
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7">No Data Found</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <script>
        $(document).ready(function () {
            new DataTable('#search-weeks', {
                responsive: true,
                autoWidth: false,
                language: {
                    searchPlaceholder: "Search..."
                }
            });
        });
    </script>
    <style>
        *{
            font-family: 'Poppins', sans-serif;
        }
        .texto{
            font-family: 'Poppins', sans-serif;
        }
        .table-header {
            font-weight: bold;
            cursor: pointer;
            font-size: 11px;
        }
        div.dataTables_length label {
            display: none;
            visibility: hidden;
        }
        div.dataTables_filter label {
            left: 20;
            color: #8b1a1a00;
            width: 100%;
            margin-top: -12px;
        }
        .dataTables_filter input {
            font-family: 'Poppins', sans-serif;
            width: 100%;
            height: 39px;
            font-size: 14px;
            background: #ffffff;
            border-radius: 4px;
            text-indent: 10px;
        }
        div.dataTables_paginate {
            font-family: 'Poppins', sans-serif;
            margin-top: 20px;
        }
        div.dataTables_info {
            display: none;
        }
    </style>
@endsection
</div>
<style>
    #full-page-loader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgb(255, 255, 255);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000; /* Asegura que esté por encima de otros elementos */
}

/* Estilos del Spinner */
.spinner {
    border: 4px solid rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    border-top: 4px solid #244062; /* Puedes ajustar el color según el esquema de colores de tu aplicación */
    width: 40px;
    height: 40px;
    animation: spin 1s linear infinite;
}

/* Animación del Spinner */
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
<script>
    // Ocultar el Spinner cuando la página se carga completamente
    window.addEventListener('load', function () {
        document.getElementById('full-page-loader').style.display = 'none';
    });
</script>
<script>
    function toggleAnswer(id) {
        var answer = document.getElementById(id);
        answer.classList.toggle('hidden');
    }
</script>
