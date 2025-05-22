{{-- resources/views/expenses.blade.php --}}
@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f8f9fa;
    }
    .card-header {
        background-color: #e3f2fd;
        font-weight: bold;
    }
    .expense-row:hover {
        background-color: #f1f9ff;
    }
    .progress {
        height: 5px;
        background-color: #dee2e6;
    }
    .progress-bar {
        background-color: #28a745;
    }
</style>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">Expense List</h2>
        <button class="btn btn-primary">+ Add Expense</button>
    </div>

    <div class="mb-4 d-flex gap-3 flex-wrap">
        <input type="text" class="form-control" placeholder="Search expenses..." style="flex: 1;">
        <select class="form-control" style="max-width: 200px;">
            <option>All Categories</option>
        </select>
        <input type="text" class="form-control" placeholder="Date range" style="max-width: 200px;">
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header d-flex px-4 py-3">
            <div class="col">Date</div>
            <div class="col">Category</div>
            <div class="col">Amount</div>
            <div class="col">Description</div>
            <div class="col">Actions</div>
        </div>
        <div class="card-body p-0">
            @php
                $expenses = [
                    ['date' => 'Feb 28, 2025', 'category' => 'Bills', 'amount' => 'KES 4,000.00', 'description' => 'Safaricom Internet Payment', 'remaining' => 80],
                    ['date' => 'Feb 27, 2025', 'category' => 'Transport', 'amount' => 'KES 400.00', 'description' => 'Transport to work', 'remaining' => 87.5],
                    ['date' => 'Feb 25, 2025', 'category' => 'Transport', 'amount' => 'KES 600.00', 'description' => 'Transport to Meru from Nairobi', 'remaining' => 87.5],
                ];
            @endphp

            @foreach ($expenses as $expense)
            <div class="d-flex border-top px-4 py-3 align-items-center expense-row">
                <div class="col">{{ $expense['date'] }}</div>
                <div class="col">
                    <div>{{ $expense['category'] }}</div>
                    <div class="progress mt-1">
                        <div class="progress-bar" style="width: {{ $expense['remaining'] }}%;"></div>
                    </div>
                    <small class="text-success">{{ $expense['remaining'] }}% remaining</small>
                </div>
                <div class="col">{{ $expense['amount'] }}</div>
                <div class="col">{{ $expense['description'] }}</div>
                <div class="col">
                    <a href="#" class="btn btn-sm btn-outline-primary me-2">Edit</a>
                    <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
