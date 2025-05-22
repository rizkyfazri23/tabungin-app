{{-- resources/views/budgets.blade.php --}}
@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f8f9fa;
    }
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }
    .table thead {
        background-color: #e3f2fd;
    }
    .progress {
        height: 10px;
        background-color: #e9ecef;
    }
    .progress-bar {
        background-color: #42a5f5;
    }
</style>

<div class="container mt-4">
    <div class="page-header">
        <h2 class="fw-bold text-primary">Budgets</h2>
        <button class="btn btn-primary">+ Create Budget</button>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Amount</th>
                        <th>Spent</th>
                        <th>Remaining</th>
                        <th>Progress</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $budgets = [
                            ['category' => 'Food & Dining', 'amount' => 6600, 'spent' => 0],
                            ['category' => 'Transport', 'amount' => 8000, 'spent' => 1000],
                            ['category' => 'Bills', 'amount' => 20000, 'spent' => 4000],
                            ['category' => 'Shopping', 'amount' => 10000, 'spent' => 0],
                            ['category' => 'Entertainment', 'amount' => 5000, 'spent' => 0],
                        ];
                    @endphp

                    @foreach ($budgets as $budget)
                        @php
                            $remaining = $budget['amount'] - $budget['spent'];
                            $progress = $budget['amount'] > 0 ? round(($budget['spent'] / $budget['amount']) * 100) : 0;
                        @endphp
                        <tr>
                            <td>{{ $budget['category'] }}</td>
                            <td>KES {{ number_format($budget['amount'], 2) }}</td>
                            <td>KES {{ number_format($budget['spent'], 2) }}</td>
                            <td>KES {{ number_format($remaining, 2) }}</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" style="width: {{ $progress }}%;" role="progressbar" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-primary">Edit</a>
                                <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
