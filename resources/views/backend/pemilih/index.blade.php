@extends('layouts.backend.app')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4 class="card-title">{{ __('field.voter') }}</h4>
        <div class="card-header-action">
            <form action="{{ route('user.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <button class="btn btn-info"> Upload</button>
            </form>
            <a href="{{ route('backend.pemilih.create') }}" class="btn btn-primary">{{ __('button.add') }}</a>
            <a href="{{ route('user.export') }}">
                <button class="btn btn-success" class="form-control">
                    Unduh
                </button>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            {!! $dataTable->table(['class' => 'table table-striped table-bordered']) !!}
        </div>
    </div>
</div>
@endsection
@push('js')
{!! $dataTable->scripts() !!}
@endpush