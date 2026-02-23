@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<!-- Quick Actions -->
<div class="col-12 mb-3">
    <a href="{{ route('surat-masuk.create') }}" class="btn btn-primary mr-2"><i class="fas fa-plus"></i> Tambah Surat Masuk</a>
    <a href="{{ route('surat-keluar.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Surat Keluar</a>
</div>

<!-- Info Boxes -->
<div class="col-md-4 col-sm-6 col-12">
    <div class="info-box bg-info">
        <span class="info-box-icon"><i class="fas fa-users"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">Total Users</span>
            <span class="info-box-number">{{ $totalUsers }}</span>
        </div>
    </div>
</div>
<div class="col-md-4 col-sm-6 col-12">
    <div class="info-box bg-success">
        <span class="info-box-icon"><i class="fas fa-inbox"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">Total Surat Masuk</span>
            <span class="info-box-number">{{ $totalSuratMasuk }}</span>
        </div>
    </div>
</div>
<div class="col-md-4 col-sm-6 col-12">
    <div class="info-box bg-warning">
        <span class="info-box-icon"><i class="fas fa-paper-plane"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">Total Surat Keluar</span>
            <span class="info-box-number">{{ $totalSuratKeluar }}</span>
        </div>
    </div>
</div>

@section('styles')
<style>
    /* FullCalendar Text Wrap Override & Sizing */
    .fc-event-title, .fc-event-main {
        white-space: normal !important; /* Allow text to wrap */
        text-overflow: clip !important;
        overflow: visible !important;
        word-wrap: break-word; /* Ensure deep words break */
        padding: 1px 2px !important; /* Smaller padding */
        line-height: 1.1 !important; /* Tighter line height */
        font-size: 0.75rem !important; /* Smaller text */
    }
    
    .fc-event {
        cursor: pointer;
        margin-bottom: 2px !important; /* Reduce space between events */
        border-radius: 3px !important;
    }

    /* Reduce spacing inside day cells */
    .fc .fc-daygrid-day-top {
        padding-bottom: 2px !important;
    }
</style>
@endsection

<!-- Chart & Calendar -->
<div class="col-md-7">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Grafik Surat Per Bulan</h3>
        </div>
        <div class="card-body">
            <div style="height: 350px;">
                <canvas id="suratChart" style="min-height: 250px; height: 100%; max-height: 100%; max-width: 100%;"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="col-md-5">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Kalender Acara</h3>
        </div>
        <div class="card-body p-0">
            <div id="calendar" style="width: 100%"></div>
        </div>
    </div>
</div>

<!-- Recent Tables -->
<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Surat Masuk Terbaru</h3>
        </div>
        <div class="card-body p-0 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nomer Surat</th>
                        <th>Pengirim</th>
                        <th>Tanggal Surat</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentSuratMasuk as $surat)
                    <tr>
                        <td>{{ $surat->nomer_surat }}</td>
                        <td>{{ $surat->pengirim }}</td>
                        <td>{{ \Carbon\Carbon::parse($surat->tanggal_surat)->format('d M Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">Belum ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Surat Keluar Terbaru</h3>
        </div>
        <div class="card-body p-0 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nomer Surat</th>
                        <th>Ditujukan</th>
                        <th>Tanggal Surat</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentSuratKeluar as $surat)
                    <tr>
                        <td>{{ $surat->nomer_surat }}</td>
                        <td>{{ $surat->ditujukan }}</td>
                        <td>{{ \Carbon\Carbon::parse($surat->tanggal_surat)->format('d M Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">Belum ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Chart Data
        const ctx = document.getElementById('suratChart').getContext('2d');
        const chartData = {!! json_encode($chartData ?? ['masuk' => [], 'keluar' => []]) !!};
        
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [
                    {
                        label: 'Surat Masuk',
                        backgroundColor: '#17a2b8', // info
                        data: chartData.masuk
                    },
                    {
                        label: 'Surat Keluar',
                        backgroundColor: '#ffc107', // warning
                        data: chartData.keluar
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });

        // Calendar Data
        var calendarEl = document.getElementById('calendar');
        var events = {!! json_encode($events ?? []) !!};
        
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next',
                center: 'title',
                right: 'today'
            },
            events: events,
            height: 400
        });
        calendar.render();
    });
</script>
@endsection
