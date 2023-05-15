@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __("messages.Savininkų_sąrašas") }}</div>
                    <div class="card-body">
                    
                    @if (Auth::user()->is_admin)
                    @can('filter')
                        <div class="clearfix">
                            <a href=" {{ route('savininkai.create') }}" class="btn btn-success float-end">{{ __("messages.Pridėti") }}</a>
                           </div> 
                            @endcan
                            @endif
                        <form method="post" action="{{ route("savininkai.search") }}">
                            @csrf
                            <div class="mb-3">
                            <label class="form-label">{{ __("messages.Vardas") }}</label>
                                <input class="form-control" name="vardas" value="{{ $filter->vardas }}" >
                            </div>
                            <div class="mb-3">
                            <label class="form-label">{{ __("messages.Pavardė") }}</label>
                                <input class="form-control" name="pavarde" value="{{ $filter->pavarde }}" >
                            </div>
                            <button class="btn btn-info">{{ __("messages.Ieškoti") }}</button>
                        </form>
                        <hr>
                        
                        <table class="table">
                        <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{ __("messages.Vardas") }}</th>
                                    <th>{{ __("messages.Pavardė") }}</th>
                                    @if (Auth::user()->is_admin)
                                    <th>{{ __("messages.Veiksmai") }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($savininkai as $savininkais)
                            <tr>
                            <td>{{ $savininkais->id }}</td>
                            <td>{{ $savininkais->vardas }}</td>
                            <td>{{ $savininkais->pavarde }}</td>
                            @can('edit', $savininkais)
                            @if (Auth::user()->is_admin)
                            <td>
                                    <a class="btn btn-info" href="{{ route('savininkai.edit', $savininkais->id) }}">{{ __("messages.Redaguoti") }}</a>
                                    <a class="btn btn-danger" href="{{route('savininkai.delete',$savininkais->id)}}">{{ __("messages.Ištrinti") }}</a>
                            </td>
                            @endif
                            @endcan
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
