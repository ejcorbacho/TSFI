@extends('layouts.backend')

@section('content')
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
