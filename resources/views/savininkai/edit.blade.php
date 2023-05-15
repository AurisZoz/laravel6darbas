@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __("messages.Savininkų_sąrašas") }}</div>
                    <div class="card-body">
                        <form method="post" action="{{ route("savininkai.update", $savininkais->id) }}">
                        @csrf
                        <div class="mb-3">
                               <label class="form-label">ID:</label>
                               <input class="form-control @error('id') is-invalid @enderror" name="id" type="text" value="{{ old('id')?:$savininkais->id }}" required>
                               <div class="invalid-feedback">@error('id') {{ $message }} @enderror</div>
                            </div>
                           <div class="mb-3">
                               <label class="form-label">{{ __("messages.Vardas") }}:</label>
                               <input class="form-control @error('vardas') is-invalid @enderror" name="vardas" type="text" value="{{ old('vardas')?:$savininkais->vardas }}" required>
                               <div class="invalid-feedback">@error('vardas') {{ $message }} @enderror</div>
                            </div>
                           <div class="mb-3">
                               <label class="form-label">{{ __("messages.Pavardė") }}:</label>
                               <input class="form-control @error('pavarde') is-invalid @enderror" name="pavarde" type="text" value="{{ old('pavarde')?:$savininkais->pavarde }}">
                               <div class="invalid-feedback">@error('pavarde') {{ $message }} @enderror</div>
                            </div>
                           <button class="btn btn-success">{{ __("messages.Išsaugoti") }} </button>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
