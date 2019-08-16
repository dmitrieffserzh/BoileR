@extends('layouts.default')

@section('title')Logistam.RU
@endsection

@section('description')
    Сервисы помощи логистам.
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif



    <div class="mt-5 p-3 bg-light border border-primary rounded">
        <form id="import" method="POST" action="{{ route('modules.TNParse.upload') }}">
            @csrf
            <div class="form-group">
                <label for="input-file">Выберите файл (CSV)</label>
                <input type="file" name="file" class="form-control-file" id="input-file">
            </div>
            <button type="button" class="btn btn-primary disabled">
                Импорт
            </button>
        </form>
    </div>
@endsection



@push('scripts')
    <script>
        $(document).ready(function (e) {

        })
    </script>

@endpush