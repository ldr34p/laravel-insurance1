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

                <!--Input form-->
                <form action="{{ route('cars.update', $car) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="reg_number" class="form-label">{{__('Registration Number')}}</label>
                        <input type="text" name="reg_number" class="form-control @error('reg_number') is-invalid @enderror" id="reg_number" value="{{ old('reg_number', $car->reg_number ?? '') }}" oninput="this.value = this.value.toUpperCase()">
                    </div>

                    <div class="mb-3">
                        <label for="brand" class="form-label">{{__('Brand')}}</label>
                        <input type="text" name="brand" class="form-control @error('brand') is-invalid @enderror" id="brand" value="{{ old('brand', $car->brand ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label for="model" class="form-label">{{__('Model')}}</label>
                        <input type="text" name="model" class="form-control @error('model') is-invalid @enderror" id="model" value="{{ old('model', $car->model ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label for="owner" class="form-label">{{__('Owner')}}</label>
                        <select class="form-control @error('owner_id') is-invalid @enderror" name="owner_id">
                            <option value="">-</option>
                            @foreach($owners as $owner)
                                <option value="{{ $owner->id }}"  {{ old('owner_id', $car->owner_id) == $owner->id ? 'selected' : '' }}>{{ $owner->name }} {{ $owner->surname }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{__('Photo')}}</label>
                        <ul>
                            @foreach($car->images as $image)
                                <li>
                                    <img src="{{asset('storage/'.$image->path)}}" alt="" width="100">
                                    <a href="{{ route('car-images.destroyImage', $image->id) }}" class="btn btn-danger">{{__('Delete')}}</a>
                                </li>
                                <br>
                            @endforeach
                        </ul>
                        <input type="file" name="image[]" class="form-control @error('image') is-invalid @enderror" id="image" multiple>
                    </div>

                    <button type="submit" class="btn btn-success">{{__('Update')}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection

