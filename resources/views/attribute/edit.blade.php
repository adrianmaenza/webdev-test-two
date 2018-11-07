@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Edit Attribute</h3>
                    </div>
                    <form action="/attribute/{{ $attribute->id }}/update" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="first_name">Attribute name</label>
                                <input type="text" name="name" class="form-control" value="{{ $attribute->name }}" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update Attribute</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection