<form action="{{ $action }}" method="GET">
    <div class="row align-items-end">
        <div class="col-md-4 mb-3 mb-md-0">
            <label for="search" class="small fw-bold text-muted">Cari Surat</label>
            <div class="input-group input-group-sm">
                <input type="text" name="search" class="form-control" placeholder="{{ $placeholder ?? 'No. Surat / Perihal...' }}" value="{{ request('search') }}">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mb-3 mb-md-0">
            <label for="start_date" class="small fw-bold text-muted">Mulai Tanggal</label>
            <input type="date" name="start_date" class="form-control form-control-sm" value="{{ request('start_date') }}">
        </div>
        
        <div class="col-md-3 mb-3 mb-md-0">
            <label for="end_date" class="small fw-bold text-muted">Sampai Tanggal</label>
            <input type="date" name="end_date" class="form-control form-control-sm" value="{{ request('end_date') }}">
        </div>

        <div class="col-md-2">
            <div class="d-flex w-100">
                <button type="submit" class="btn btn-info btn-sm w-100 text-white mr-2">
                    <i class="fas fa-filter mr-1"></i> Filter
                </button>
                @if(request()->hasAny(['search', 'start_date', 'end_date']))
                    <a href="{{ $action }}" class="btn btn-secondary btn-sm w-100">
                        <i class="fas fa-undo mr-1"></i> Reset
                    </a>
                @endif
            </div>
        </div>
    </div>
</form>
