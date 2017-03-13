@extends('layouts.backend')

@section('content')
<div class="container">
    Benvingut {{Auth::user()->name }}! <br/><br/>
    Analytics: <br/><br/>

    <div class="chart">
        <canvas id="newUsersChart" style="height: 180px;"></canvas>
    </div>

    <label for="sel1">Dispositius:</label>
    <select id="deviceCategoriesSelector" class="form-control">
        <option value="sessions">Sessions</options>
        <option value="users">Usuaris</options>
        <option value="newUsers">Nous usuaris</options>
    </select>
    </div>

    <div class="chart">
        <canvas id="deviceCategoriesChart" style="height: 180px;"></canvas>
    </div>

    <div class="chart">
        <canvas id="mobileOSChart" style="height: 180px;"></canvas>
    </div>

    <div class="chart">
            <canvas id="genderChart" style="height: 180px;"></canvas>
    </div>

    <div class="chart">
        <canvas id="ageBracketChart" style="height: 180px;"></canvas>
    </div>
</div>
@endsection
