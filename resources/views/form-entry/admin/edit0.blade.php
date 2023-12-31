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
                                <input type="text" name="profile_name" id="profile_name" class="form-control" required value="{{ $formEntry->profile_name }}">
                            </div>

                            <div class="form-group">
                                <label for="profile_image">{{ __('Profile Image') }}</label>
                                <input type="file" name="profile_image" id="profile_image" class="form-control-file">
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input type="email" name="email" id="email" class="form-control" required value="{{ $formEntry->email }}">
                            </div>

                            <div class="form-group">
                                <label for="address">{{ __('Address') }}</label>
                                <textarea name="address" id="address" class="form-control">{{ $formEntry->address }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="pan_card_number">{{ __('PAN Card Number') }}</label>
                                <input type="text" name="pan_card_number" id="pan_card_number" class="form-control" required value="{{ $formEntry->pan_card_number }}">
                            </div>

                            <div class="form-group">
                                <label for="aadhar_card_number">{{ __('Aadhar Card Number') }}</label>
                                <input type="text" name="aadhar_card_number" id="aadhar_card_number" class="form-control" required value="{{ $formEntry->aadhar_card_number }}">
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
