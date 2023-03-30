@extends('adminlte::page')

@section('content_header')
    <h1>Edit Lead</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-body">
                    <form action="{{ route('leads.update', ['id' => $lead->id]) }}" method="POST">

                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $lead->name) }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $lead->email) }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $lead->phone) }}">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="in_progress" {{ $lead->status == 'in_progress' ? 'selected' : '' }}>En cours</option>
                                <option value="dead" {{ $lead->status == 'dead' ? 'selected' : '' }}>Non intéressé</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select class="form-control" id="type" name="type">
                                <option value="B2B" {{ $lead->type == 'B2B' ? 'selected' : '' }}>B2B</option>
                                <option value="B2C" {{ $lead->type == 'B2C' ? 'selected' : '' }}>B2C</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Lead</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
