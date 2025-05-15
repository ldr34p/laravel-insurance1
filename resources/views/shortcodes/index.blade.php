@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <a href="{{ route("shortcodes.create") }}" class="btn btn-success">{{ __('Add New ShortCode') }}</a>
                <table class="table">
                    <tbody>
                    <tr>
                        <th>{{ __("ShortCode") }}</th>
                        <th>{{ __("Replace") }}</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </tbody>
                    <tbody>
                    @foreach ($codes as $code)
                        <tr>
                            <td>{{$code->shortcode}}</td>
                            <td>{{$code->replace}}</td>
                            <td>
                                <a href="{{ route('shortcodes.edit', $code->id) }}" class="btn btn-primary">
                                    {{ __("Edit") }}
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('shortcodes.destroy', $code->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
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
