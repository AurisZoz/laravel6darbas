@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __("messages.Automobilių_sąrašas") }}</div>
                    <div class="card-body">
                    @can('create', \App\Models\Savininkai::class)
                    @if (Auth::user()->is_admin)
                    <a href="{{ route('automobiliais.create') }}" class="btn btn-success float-end">{{ __("messages.Pridėti") }}</a>
                    @endif
                    @endcan
                    <form method="post" action="{{ route("automobiliais.search") }}">
                    @csrf
                    </br>
                    {{ __("messages.Filtras") }}
                    </br>
                    {{ __("messages.Savininkas") }}:
                    <select id="", vardas="", pavarde="">
                        @foreach($data as $row)
                        <option value="{{$row->id}}">{{$row->vardas}} {{$row->pavarde}}</option>
                        @endforeach 
                        </select>
                          </br>
                          <div class="mb-3">
                            <label class="form-label">{{ __("messages.Markė") }}</label>
                                <input class="form-control" name="marke" value="{{ $filter->marke }}" >
                            </div>
                            <div class="mb-3">
                            <label class="form-label">{{ __("messages.Modelis") }}</label>
                                <input class="form-control" name="modelis" value="{{ $filter->modelis }}" >
                            </div>
                            <div class="mb-3">
                            <label class="form-label">{{ __("messages.Numeris") }}</label>
                                <input class="form-control" name="numeris" value="{{ $filter->numeris }}" >
                            </div>                   
                            <button class="btn btn-info">{{ __("messages.Ieškoti") }}</button>
                            
                        </form>
                        <hr>
                    <table class="table">
                        <thead>
                                <tr>
                                    <th>{{ __("messages.Savininkai") }}</th> 
                                    <th>{{ __("messages.Markė") }}</th>
                                    <th>{{ __("messages.Modelis") }}</th>
                                    <th>{{ __("messages.Numeris") }}</th>
                                    <th>{{ __("messages.Nuotrauka") }}</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($automobiliais as $automobiliai)
                            <tr>
                            <td>
                            @foreach($automobiliai->savininkai as $savininkais)
                            {{$savininkais->id}} {{$savininkais->vardas}} {{$savininkais->pavarde}}<br>
                            @endforeach
                            </td>
                            <td>{{ $automobiliai->marke }}</td>
                            <td>{{ $automobiliai->modelis }}</td>
                            <td>{{ $automobiliai->numeris }}</td>
                            <td>
                            <img src="{{ asset('/storage/image-analysis.png') }}" style="width:100px;">
                                    @if ($automobiliai->image!==null)
                                      <img src="{{ asset('/storage/automobiliais/'.$automobiliai->image) }}" style="width:100px">
                                    @endif
                                </td>
                                @can('update', $savininkais)
                            @if (Auth::user()->is_admin)
                            <td>
                                    <a class="btn btn-info" href="{{ route('automobiliais.edit', $automobiliai->id) }}">{{ __("messages.Redaguoti") }}</a>
                                </td>
                                @endcan
                                <td>
                                @can('delete', $savininkais)
                                    <form method="post" action="{{ route('automobiliais.destroy', $automobiliai->id) }}">
                                        @csrf
                                        @method("delete")
                                        <button class="btn btn-danger">{{ __("messages.Ištrinti") }}</button>
                                    </form>
                                </td>
                                @endcan
                                @endif

                                @endforeach
                                
                            </tr>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
