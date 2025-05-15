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
                <form action="{{ route('cars.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="reg_number" class="form-label">{{__('Registration Number')}}</label>
                        <input type="text" name="reg_number" class="form-control" id="reg_number" required>
                    </div>

                    <div class="mb-3">
                        <label for="brand" class="form-label">{{__('Brand')}}</label>
                        <input type="text" name="brand" class="form-control" id="brand" required>
                    </div>

                    <div class="mb-3">
                        <label for="model" class="form-label">{{__('Model')}}</label>
                        <input type="text" name="model" class="form-control" id="model" required>
                    </div>

                    <div class="mb-3">
                        <label for="owner" class="form-label">{{__('Owner')}}</label>
                        <select class="form-control" name="owner_id">
                            <option value="">-</option>
                            @foreach($owners as $owner)
                                <option value="{{ $owner->id }}">{{ $owner->name }} {{ $owner->surname }}</option>
                            @endforeach

                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">{{__('Add')}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection

