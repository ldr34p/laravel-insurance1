@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <a href="{{ route("owners.create") }}" class="btn btn-success">{{ __('Add New Owner') }}</a>
            <table class="table">
                <tbody>
                <tr>
                    <th>{{ __("Name") }}</th>
                    <th>{{ __("Surname") }}</th>
                    <th>{{ __("Email") }}</th>
                    <th>{{ __("Phone") }}</th>
                    <th>{{ __("Address") }}</th>
                    <th></th>
                    <th></th>
                </tr>
                </tbody>
                <tbody>
                @foreach ($owners as $owner)
                    <tr>
                        <td>{{$owner->name}}</td>
                        <td>{{$owner->surname}}</td>
                        <td>{{$owner->email}}</td>
                        <td>{{$owner->phone}}</td>
                        <td>{{$owner->address}}</td>
                        <td>
                            <a href="{{ route('owners.edit', $owner->id) }}" class="btn btn-primary">
                                {{ __("Edit") }}
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('owners.destroy', $owner->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button href="" class="btn btn-danger" onclick="return confirm('{{__('Are you sure?')}}')">{{ __('Delete')}}</button>
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
