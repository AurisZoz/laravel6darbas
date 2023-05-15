@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __("messages.Automobilių_sąrašas") }}</div>
                    <div class="card-body">
                    <form method="post" action="{{ route("automobiliais.store") }}">
                    @csrf
                           <div class="mb-3">
                               <label class="form-label">ID:</label>
                               <input class="form-control @error('id') is-invalid @enderror" name="id" type="text" value="{{ old('id') }}">
                               <div class="invalid-feedback">@error('id') {{ $message }} @enderror</div>
                           </div>
                           <div class="mb-3">
                               <label class="form-label">{{ __("messages.Markė") }}:</label>
                               <input class="form-control @error('marke') is-invalid @enderror" name="marke" type="text" value="{{ old('marke') }}">
                               <div class="invalid-feedback">@error('marke') {{ $message }} @enderror</div>
                           </div>
                           <div class="mb-3">
                               <label class="form-label">{{ __("messages.Modelis") }}:</label>
                               <input class="form-control @error('modelis') is-invalid @enderror" name="modelis" type="text" value="{{ old('modelis') }}">
                               <div class="invalid-feedback">@error('modelis') {{ $message }} @enderror</div>
                           </div>
                           <div class="mb-3">
                               <label class="form-label">{{ __("messages.Numeris") }}:</label>
                               <input class="form-control @error('numeris') is-invalid @enderror" name="numeris" type="text" value="{{ old('numeris') }}">
                               <div class="invalid-feedback">@error('numeris') {{ $message }} @enderror</div>
                           </div>
                            <div class="mb-3">
                               <label class="form-label">{{ __("messages.Nuotrauka") }}:</label>
                               <input class="form-control" type="file" name="image" >
                           </div>

                           <button class="btn btn-success"> {{ __("messages.Pridėti") }}</button>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


