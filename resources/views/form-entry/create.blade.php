@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Form Entry') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('form-entry.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="profile_name">{{ __('Profile Name') }}</label>
                                <input type="text" name="profile_name" id="profile_name" class="form-control" required>
                                @error('profile_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="profile_image">{{ __('Profile Image') }}</label>
                                <input type="file" name="profile_image" id="profile_image" class="form-control-file" required>
                                @error('profile_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                                @error('Email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address">{{ __('Address') }}</label>
                                <textarea name="address" id="address" class="form-control"></textarea>
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pan_card_number">{{ __('PAN Card Number') }}</label>
                                <input type="text" name="pan_card_number" id="pan_card_number" class="form-control" required>
                                @error('pan_card_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="aadhar_card_number">{{ __('Aadhar Card Number') }}</label>
                                <input type="text" name="aadhar_card_number" id="aadhar_card_number" class="form-control" required>
                                @error('aadhar_card_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection