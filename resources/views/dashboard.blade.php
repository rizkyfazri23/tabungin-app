@extends('layouts.app')

@section('content')
<div class="fade-in">
    <!-- Top Metrics -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title text-uppercase">Total Expenses</h6>
                    <div class="display-6 fw-bold">Rp 5.000.000</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title text-uppercase">This Month</h6>
                    <div class="display-6 fw-bold">Rp 500.000</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title text-uppercase">Monthly Budget</h6>
                    <div class="display-6 fw-bold">Rp 1.000.000</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title text-uppercase">Remaining Budget</h6>
                    <div class="display-6 fw-bold text-success">Rp 500.000</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Active Budgets -->
    <div class="card mb-4">
        <div class="card-header">
            Active Budgets
        </div>
        <div class="card-body">
            @php
                $budgets = [
                    ['name' => 'Transport', 'used' => 200000, 'limit' => 500000],
                    ['name' => 'Bills', 'used' => 300000, 'limit' => 400000],
                    ['name' => 'Shopping', 'used' => 150000, 'limit' => 250000],
                    ['name' => 'Entertainment', 'used' => 100000, 'limit' => 200000],
                    ['name' => 'Food & Dining', 'used' => 250000, 'limit' => 300000],
                ];
            @endphp
            @foreach($budgets as $budget)
            <div class="mb-4">
                <div class="d-flex justify-content-between">
                    <div>{{ $budget['name'] }}</div>
                    <div>Rp {{ number_format($budget['used'],0,',','.') }} / Rp {{ number_format($budget['limit'],0,',','.') }}</div>
                </div>
                @php
                    $percent = intval($budget['used'] / $budget['limit'] * 100);
                @endphp
                <div class="progress" style="height: 8px;">
                    <div class="progress-bar" role="progressbar" style="width: {{ $percent }}%;" aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small class="text-muted">Remaining: Rp {{ number_format($budget['limit'] - $budget['used'],0,',','.') }}</small>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Charts -->
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Category Distribution</div>
                <div class="card-body">
                    <!-- Placeholder for Pie Chart -->
                    <canvas id="categoryChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Monthly Trend</div>
                <div class="card-body">
                    <!-- Placeholder for Line Chart -->
                    <canvas id="trendChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx1 = document.getElementById('categoryChart').getContext('2d');
    new Chart(ctx1, {
        type: 'doughnut',
        data: {
            labels: ['Transport', 'Bills', 'Shopping', 'Entertainment', 'Food & Dining'],
            datasets: [{
                data: [200000, 300000, 150000, 100000, 250000],
                backgroundColor: ['#0d6efd','#198754','#ffc107','#dc3545','#6f42c1'],
            }]
        }
    });
    const ctx2 = document.getElementById('trendChart').getContext('2d');
    new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ['Jan','Feb','Mar','Apr','May','Jun'],
            datasets: [{
                label: 'Expenses',
                data: [500000,450000,600000,550000,650000,500000],
                fill: false,
                tension: 0.4
            }]
        },
        options: {
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
@endsection