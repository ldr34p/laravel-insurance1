@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <div>
                                {{ $error }}
                            </div>

                        @endforeach
                    </div>
                @endif
                <form action="{{ route('shortcodes.update', $code) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="shortcode" class="form-label">ShortCode</label>
                        <input type="text" name="shortcode" class="form-control" id="shortcode" value="{{$code->shortcode}}" required>
                    </div>

                    <div class="mb-3">
                        <label for="replace" class="form-label">Replace</label>
                        <input type="text" name="replace" class="form-control" id="replace" value="{{$code->replace}}" required>
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection

