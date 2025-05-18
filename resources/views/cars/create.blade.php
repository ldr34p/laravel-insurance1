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

                <!--Input fields for creating a new car-->
                <form action="{{ route('cars.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="reg_number" class="form-label">{{__('Registration Number')}}</label>
                        <input type="text" name="reg_number" class="form-control @error('reg_number') is-invalid @enderror"  value="{{ old('reg_number') }}" id="reg_number" oninput="this.value = this.value.toUpperCase()">
                    </div>

                    <div class="mb-3">
                        <label for="brand" class="form-label">{{__('Brand')}}</label>
                        <input type="text" name="brand" class="form-control @error('brand') is-invalid @enderror"  value="{{ old('brand') }}" id="brand">
                    </div>

                    <div class="mb-3">
                        <label for="model" class="form-label">{{__('Model')}}</label>
                        <input type="text" name="model" class="form-control @error('model') is-invalid @enderror"  value="{{ old('model') }}" id="model">
                    </div>

                    <div class="mb-3">
                        <label for="owner" class="form-label">{{__('Owner')}}</label>
                        <select class="form-control @error('owner_id') is-invalid @enderror" name="owner_id">
                            <option value="">-</option>
                            @foreach($owners as $owner)
                                <option value="{{ $owner->id }}"  {{ old('owner_id') == $owner->id ? 'selected' : '' }}>{{ $owner->name }} {{ $owner->surname }}</option>
                            @endforeach

                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">{{__('Add')}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection

