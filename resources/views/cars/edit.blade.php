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
                <form action="{{ route('cars.update', $car) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="reg_number" class="form-label">Registration Number</label>
                        <input type="text" name="reg_number" class="form-control" id="reg_number" value="{{$car->reg_number}}" required>
                    </div>

                    <div class="mb-3">
                        <label for="brand" class="form-label">Brand</label>
                        <input type="text" name="brand" class="form-control" id="brand" value="{{$car->brand}}" required>
                    </div>

                    <div class="mb-3">
                        <label for="model" class="form-label">Model</label>
                        <input type="text" name="model" class="form-control" id="model" value="{{$car->model}}" required>
                    </div>

                    <div class="mb-3">
                        <label for="owner" class="form-label">Owner</label>
                        <select class="form-control" name="owner_id">
                            <option value="" selected>-</option>
                            @foreach($owners as $owner)
                                <option value="{{ $owner->id }}"  {{ ($car->owner_id==$owner->id)?'selected':'' }}  >{{ $owner->name }} {{ $owner->surname }}</option>
                            @endforeach

                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection

