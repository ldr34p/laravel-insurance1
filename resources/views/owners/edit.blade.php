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
                <form action="{{ route('owners.update', $owner) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">{{__('Name')}}</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$owner->name}}" required>
                    </div>

                    <div class="mb-3">
                        <label for="surname" class="form-label">{{__('Surname')}}</label>
                        <input type="text" name="surname" class="form-control" id="surname" value="{{$owner->surname}}" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">{{__('Phone')}}</label>
                        <input type="number" name="phone" class="form-control" id="phone" value="{{$owner->phone}}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">{{__('Email')}}</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{$owner->email}}" required>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">{{__('Address')}}</label>
                        <input type="text" name="address" class="form-control" id="address" value="{{$owner->address}}" required>
                    </div>
                    <button type="submit" class="btn btn-success">{{__('Update')}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
