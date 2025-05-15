@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{ route('shortcodes.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="shortcode" class="form-label">ShortCode</label>
                        <input type="text" name="shortcode" class="form-control" id="shortcode" value="{{ old('shortcode') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="replace" class="form-label">Replace</label>
                        <input type="text" name="replace" class="form-control" id="replace" value="{{ old('replace') }}" required>
                    </div>

                    <button type="submit" class="btn btn-success">Add Owner</button>
                </form>
            </div>
        </div>
    </div>
@endsection
