@extends('layouts.layout')

@section('title', 'Dashboard')

@section('content')
<div class="link">Dashboard</div>
<div class="stats-countainer">
    <div class="stat-item">
        <div class="icon">
            <i class="fi-rr-badge"></i>
        </div>
        <div class="text">
            <p>Vente Direct ({{ \App\Models\Factures::all()->count() }})</p>
            <h3>
                <span></span>
            </h3>
        </div>
    </div>

    <div class="stat-item">
        <div class="icon">
            <i class="fi-rr-badge"></i>
        </div>
        <div class="text">
            <p>Dépenses ({{ \App\Models\Depenses::all()->count() }})</p>
            <h3>
                <span></span>
            </h3>
        </div>
    </div>

    <div class="stat-item mt-20">
        <div class="icon">
            <i class="fi-rr-badge"></i>
        </div>
        <div class="text">
            <p>Articles ({{ \App\Models\Articles::all()->count() }})</p>
            <h3>
                <span></span>
            </h3>
        </div>
    </div>

    <div class="stat-item">
        <div class="icon">
            <i class="fi-rr-badge"></i>
        </div>
        <div class="text">
            <p>Categorie ({{ \App\Models\Categories::all()->count() }})</p>
            <h3>
                <span></span>
            </h3>
        </div>
    </div>
</div>
<div style="margin-top: 20px;display:flex;">
    <div class="chartJS" style="border-right: 1px solid #e2e2e2;width: 69%;padding-right: 10px;">
        <canvas id="chart__stats_year"></canvas>
    </div>
    <div style="width: 30%;margin-left: 25px;">
        <canvas id="chart__stats_doughnut"></canvas>
    </div>
</div>
@endsection

@section('script')
    var categorie_article = {!! $categorie_article !!};
@endsection