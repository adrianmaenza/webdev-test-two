@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Delete User</h3>
                    </div>

                    <div class="card-body lead text-danger">
                        Are you sure you want to remove this user account?
                    </div>
                    <form action="/user/{{ $user->id }}/destroy" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="first_name">First name</label>
                                <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="surname">Surname</label>
                                <input type="text" name="surname" class="form-control" value="{{ $user->surname }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="date_of_birth">Date of birth</label>
                                <date-picker date_of_birth="{{ $user->date_of_birth }}"></date-picker>
                            </div>
                            @foreach($attr as $attribute)
                            <div class="form-group">
                                <label for="surname">{{ $attribute->name }}</label>
                                <input 
                                    type="text" 
                                    name="{{ strtolower($attribute->name) }}" 
                                    class="form-control" 
                                    value="{{ $user->attributes->where('id', $attribute->id)->first() ? $user->attributes->where('id', $attribute->id)->first()->pivot->value : '' }}" 
                                    readonly>
                            </div>
                            @endforeach
                        </div>
                        <div class="modal-footer">
                            <a href="{{ url('/home') }}" class="btn btn-primary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Delete account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection