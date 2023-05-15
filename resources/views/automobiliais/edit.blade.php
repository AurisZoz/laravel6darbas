@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">{{ __("messages.Savininkų_sąrašas") }}</div>
                    <div class="card-body">
                       <form method="post" action="{{ route("automobiliais.update", $automobiliai->id) }}">
                           @csrf
                           @method('put')
                           <div class="mb-3">
                               <label class="form-label">ID:</label>
                               <input class="form-control @error('id') is-invalid @enderror" name="id" type="text" value="{{old('id')?:$automobiliai->id }}" required>
                               <div class="invalid-feedback">@error('id') {{ $message }} @enderror</div>
                           </div>
                           <div class="mb-3">
                               <label class="form-label">{{ __("messages.Markė") }}:</label>
                               <input class="form-control @error('marke') is-invalid @enderror" name="marke" type="text" value="{{old('marke')?:$automobiliai->marke }}" required>
                               <div class="invalid-feedback">@error('marke') {{ $message }} @enderror</div>
                           </div>
                           <div class="mb-3">
                               <label class="form-label">{{ __("messages.Modelis") }}:</label>
                               <input class="form-control @error('modelis') is-invalid @enderror" name="modelis" type="text" value="{{old('modelis')?:$automobiliai->modelis }}" required>
                               <div class="invalid-feedback">@error('modelis') {{ $message }} @enderror</div>
                           </div>
                           <div class="mb-3">
                               <label class="form-label">{{ __("messages.Numeris") }}:</label>
                               <input class="form-control @error('numeris') is-invalid @enderror" name="numeris" type="text" value="{{old('numeris')?:$automobiliai->numeris }}" required>
                               <div class="invalid-feedback">@error('numeris') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-3">
                               <label class="form-label">{{ __("messages.Nuotrauka") }}:</label>
                               <input class="form-control" type="file" name="image" >
                           </div>

                           <button class="btn btn-success">{{ __("messages.Išsaugoti") }}</button>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
