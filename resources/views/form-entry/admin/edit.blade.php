<!-- resources/views/form-entry/admin/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Form Entry') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.form-entry.update', $formEntry->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="profile_name">{{ __('Profile Name') }}</label>
                                <input type="text" name="profile_name" id="profile_name" class="form-control" required value="{{ $formEntry->profile_name }}" {{old('profile_name')}}>
                                @error('profile_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="profile_image">{{ __('Profile Image') }}</label>
                                <input type="file" name="profile_image" id="profile_image" class="form-control-file">
                                @error('profile_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input type="email" name="email" id="email" class="form-control" required value="{{ $formEntry->email }}" {{old('email')}}>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address">{{ __('Address') }}</label>
                                <textarea name="address" id="address" class="form-control">{{ $formEntry->address }} {{old('address')}}</textarea>
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pan_card_number">{{ __('PAN Card Number') }}</label>
                                <input type="text" name="pan_card_number" id="pan_card_number" class="form-control" required value="{{ $formEntry->pan_card_number }}" {{old('pan_card_number')}}>
                                @error('pan_card_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="aadhar_card_number">{{ __('Aadhar Card Number') }}</label>
                                <input type="text" name="aadhar_card_number" id="aadhar_card_number" class="form-control" required value="{{ $formEntry->aadhar_card_number }}" {{old('aadhar_card_number')}}>
                                @error('aadhar_card_number')v
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
