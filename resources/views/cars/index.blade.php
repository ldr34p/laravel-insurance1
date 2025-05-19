@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                @can('createCar')
                <a href="{{ route("cars.create") }}" class="btn btn-success">{{ __('Add New Car') }}</a>
                @endcan
                    <table class="table">
                    <tbody>
                    <tr>
                        <th>{{__('Photo')}}</th>
                        <th>{{ __("Registration Number") }}</th>
                        <th>{{ __("Brand") }}</th>
                        <th>{{ __("Model") }}</th>
                        <th>{{ __("Owner") }}</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </tbody>
                    <tbody>
                    @foreach ($cars as $car)
                        <tr>
                            <td>
                                @if ($car->images->first())
                                        <img src="{{ asset('storage/' . $car->images->first()->path) }}" alt="" style="width: 100px">
                                @endif
                            </td>
                            <td>{{$car->reg_number}}</td>
                            <td>{{$car->brand}}</td>
                            <td>{{$car->model}}</td>
                            <td>
                                @if ($car->owner!=null)
                                    {{ $car->owner->name }}  {{ $car->owner->surname }}
                                @else
                                    undefined
                                @endif
                            </td>
                            <td>
                                @can('editCar', $car)
                                    <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-primary">{{ __("Edit") }}</a>
                                @endcan
                            </td>
                            <td>
                                @can('deleteCar', $car)
                                    <form action="{{ route('cars.destroy', $car->id) }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <button href="" onclick="return confirm('{{__('Are you sure?')}}')" class="btn btn-danger">{{ __("Delete") }}</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
