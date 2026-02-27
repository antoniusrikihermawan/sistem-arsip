<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Surat - {{ $namaBulan }} {{ $tahun }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 11px;
            color: #333;
            padding: 20px;
        }

        /* Header */
        .report-header {
            text-align: center;
            margin-bottom: 25px;
            border-bottom: 3px solid #007bff;
            padding-bottom: 15px;
        }
        .report-header h1 {
            font-size: 18px;
            color: #007bff;
            margin-bottom: 4px;
        }
        .report-header h2 {
            font-size: 14px;
            font-weight: 400;
            color: #555;
        }
        .report-header .period {
            font-size: 12px;
            margin-top: 6px;
            color: #777;
        }

        /* Summary */
        .summary {
            display: flex;
            margin-bottom: 20px;
        }
        .summary-box {
            display: inline-block;
            width: 48%;
            padding: 10px 14px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-right: 2%;
        }
        .summary-box .label {
            font-size: 10px;
            color: #888;
            text-transform: uppercase;
        }
        .summary-box .value {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        /* Section Title */
        .section-title {
            font-size: 13px;
            font-weight: bold;
            color: #007bff;
            margin: 18px 0 8px 0;
            padding-bottom: 4px;
            border-bottom: 1px solid #007bff;
        }

        /* Tables */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 16px;
            font-size: 10px;
        }
        table th {
            background-color: #007bff;
            color: #fff;
            padding: 6px 8px;
            text-align: left;
            font-weight: 600;
        }
        table td {
            padding: 5px 8px;
            border-bottom: 1px solid #eee;
        }
        table tr:nth-child(even) td {
            background-color: #f8f9fa;
        }
        table .text-center {
            text-align: center;
        }

        /* Footer */
        .report-footer {
            margin-top: 30px;
            text-align: center;
            font-size: 9px;
            color: #aaa;
            border-top: 1px solid #ddd;
            padding-top: 8px;
        }

        /* Page break */
        .page-break {
            page-break-before: always;
        }
    </style>
</head>
<body>
    {{-- Header --}}
    <div class="report-header">
        <h1>Sistem Arsip Surat</h1>
        <h2>Laporan Surat Masuk & Surat Keluar</h2>
        <div class="period">Periode: {{ $namaBulan }} {{ $tahun }}</div>
    </div>

    {{-- Summary --}}
    <div class="summary">
        <div class="summary-box">
            <div class="label">Total Surat Masuk</div>
            <div class="value">{{ $laporan['total_masuk'] }}</div>
        </div>
        <div class="summary-box">
            <div class="label">Total Surat Keluar</div>
            <div class="value">{{ $laporan['total_keluar'] }}</div>
        </div>
    </div>

    {{-- Tabel Surat Masuk --}}
    <div class="section-title">Surat Masuk</div>
    <table>
        <thead>
            <tr>
                <th style="width: 30px;">No</th>
                <th>Nomer Surat</th>
                <th>Tanggal Surat</th>
                <th>Tanggal Terima</th>
                <th>Pengirim</th>
                <th>Perihal</th>
                <th>Ditujukan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($laporan['surat_masuk'] as $index => $surat)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $surat->nomer_surat }}</td>
                    <td>{{ $surat->tanggal_surat->format('d-m-Y') }}</td>
                    <td>{{ $surat->tanggal_terima->format('d-m-Y') }}</td>
                    <td>{{ $surat->pengirim }}</td>
                    <td>{{ $surat->perihal }}</td>
                    <td>{{ $surat->ditujukan }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Tabel Surat Keluar --}}
    <div class="section-title">Surat Keluar</div>
    <table>
        <thead>
            <tr>
                <th style="width: 30px;">No</th>
                <th>Nomer Surat</th>
                <th>Tanggal Surat</th>
                <th>Tanggal Kirim</th>
                <th>Perihal</th>
                <th>Ditujukan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($laporan['surat_keluar'] as $index => $surat)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $surat->nomer_surat }}</td>
                    <td>{{ $surat->tanggal_surat->format('d-m-Y') }}</td>
                    <td>{{ $surat->tanggal_kirim->format('d-m-Y') }}</td>
                    <td>{{ $surat->perihal }}</td>
                    <td>{{ $surat->ditujukan }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Footer --}}
    <div class="report-footer">
        Dicetak pada: {{ now()->format('d F Y H:i') }} | {{ config('app.name', 'Sistem Arsip Surat') }}
    </div>
</body>
</html>
