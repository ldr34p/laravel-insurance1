@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <a href="{{ route("cars.create") }}" class="btn btn-success">{{ __('Add New Car') }}</a>
                <table class="table">
                    <tbody>
                    <tr>
                        <th>{{ __("Photo") }}</th>
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
                            @if ($car->photo->first())
                                <td>
                                    <img src="{{ asset('storage/' . $car->photo->first()->path) }}" alt="" style="width: 100px">
                                </td>
                            @else
                                <td></td>
                            @endif
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
                                <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-primary">
                                    {{ __("Edit") }}
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('cars.destroy', $car->id) }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button href="" class="btn btn-danger" onclick="return confirm('{{__('Are you sure?')}}')">{{ __('Delete') }}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
