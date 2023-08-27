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
    <div style="margin-top: 20px;display:flex;flex-direction: column">
        <div class="chartJS" style="padding-right: 10px;">
            <canvas id="chart__stats_year"></canvas>
        </div>
    </div>
    <div style="display:flex;border-top: 1px solid #e2e2e2;margin-top: 25px;padding-top: 25px;">
        <div style="border-right: 1px solid #e2e2e2;width: 50%;">
            <canvas id="chart__stats_doughnut"></canvas>
        </div>

        <div style="">
            <canvas id="chart__stats_doughnut"></canvas>
        </div>

    </div>
@endsection

@section('script')
    var categorie_article = {!! $categorie_article !!};
    var situation = {!! $situation !!};
@endsection