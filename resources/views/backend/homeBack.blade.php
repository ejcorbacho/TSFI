@extends('layouts.backend')

@section('content')

<!-- Gràfics Analytics -->

<script src="{{asset('js/backend/analyticsUI.js')}}"></script>
<script src="{{asset('plugins/chartjs/Chart-2.5.js')}}"></script>

<div>
    <div class="chart">
        <canvas id="newUsersChart" style="height: 180px;"></canvas>
    </div>

    <div>
        <div class="chart">
            <canvas id="deviceCategoriesChart" style="height: 180px;"></canvas>
        </div>

        <div class="chart">
            <canvas id="mobileOSChart" style="height: 180px;"></canvas>
        </div>

         <div>
            <select id="deviceCategoriesSelector" class="form-control">
                <option value="sessions">Sessions</options>
                <option value="users">Usuaris</options>
                <option value="newUsers">Nous usuaris</options>
            </select>
        </div>
    </div>

    <div class="chart">
         <canvas id="genderChart" style="height: 180px;"></canvas>
    </div>

    <div class="chart">
        <canvas id="ageBracketChart" style="height: 180px;"></canvas>
    </div>
</div>
@endsection
