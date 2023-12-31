@extends('layouts.backend.app')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4 class="card-title"> {{ __('button.add') }} {{ __('field.kandidat') }}</h4>
        <div class="card-header-action">
            <a href="{{ route('backend.kandidat.index') }}" class="btn btn-secondary">{{ __('button.back') }}</a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('backend.kandidat.update',$data['kandidat']) }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-forms.input :label="__('field.kandidat_name')" name="name" id="name" isRequired="true" :value="$data['kandidat']['name']" />
            <x-forms.input :label="__('field.number')" name="nomor_urut" id="nomor_urut" isRequired="true" :value="$data['kandidat']['nomor_urut']" />
            <x-forms.input :label="__('field.visi')" name="visi" id="visi" isRequired="true" type="textarea" :value="$data['kandidat']['visi']" />
            <x-forms.input :label="__('field.misi')" name="misi" id="misi" isRequired="true" type="textarea" :value="$data['kandidat']['misi']" />
            <x-forms.input :label="__('field.photo')" name="photo" id="photo" type="file" hintText="Kosongkan Jika Tidak Akan Mengubah Photo" />
            <div class="text-end">
                <button type="submit" class="btn btn-primary">{{ __('button.save') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection