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
                <form action="{{ route('owners.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">{{__('Name')}}</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="surname" class="form-label">{{__('Surname')}}</label>
                        <input type="text" name="surname" class="form-control" id="surname" value="{{ old('surname') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">{{__('Phone')}}</label>
                        <input type="number" name="phone" class="form-control" id="phone" value="{{ old('phone') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">{{__('Email')}}</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">{{__('Address')}}</label>
                        <input type="text" name="address" class="form-control" id="address" value="{{ old('address') }}" required>
                    </div>
                    <button type="submit" class="btn btn-success">{{__('Add Owner')}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
