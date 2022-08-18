@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ __('Your Channel') }}</div>
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="card-body">
                        <form method="POST" action="{{ route('channels.update', $channel) }}">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $channel->name }}"  autofocus>

                                    @error('name')
                                    <div class=" alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="slug" class="col-md-4 col-form-label text-md-end">{{ __('Your URL') }}</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">{{ config('app.url') }}/channels/</span>
                                    </div>
                                        <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $channel->slug }}" >
                                    </div>


                                    @error('slug')
                                    <div class=" alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" >{{ $channel->description }}</textarea>

                                    @error('description')
                                    <div class=" alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" >

                                    @error('image')
                                    <div class=" alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
