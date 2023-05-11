@extends('layouts.app')
<div class="setting-container">
    <div class="setting-header text-end">
        {{-- Header --}}
    </div>

    <div class="d-flex container-fluid p-5 px-5">
        <div class="sidebar-hero col-3 p-3">
            <div class="mb-1">
                <div class="row">
                    <div class="col-4 w-100">
                        <div class="list-group  ms-3" id="list-tab" role="tablist">
                            <h5>Account</h5>
                            <div>
                                <a class="list-group-item list-group-item-action  active" id="list-home-list"
                                    data-bs-toggle="list" href="#list-setting" role="tab"
                                    aria-controls="list-home">Settings</a>
                            </div>
                            <div>
                                <a class="list-group-item list-group-item-action" id="list-profile-list"
                                    data-bs-toggle="list" href="#list-password" role="tab"
                                    aria-controls="list-profile">Password</a>
                            </div>

                            <h5 class="mt-3">Preferences</h5>
                            <div>
                                <a class="list-group-item list-group-item-action" id="list-home-list"
                                    data-bs-toggle="list" href="#list-home" role="tab"
                                    aria-controls="list-home">Emails</a>
                            </div>
                            <div>
                                <a class="list-group-item list-group-item-action" id="list-profile-list"
                                    data-bs-toggle="list" href="#list-language" role="tab"
                                    aria-controls="list-profile">Language</a>
                            </div>
                            <div>
                                <a class="list-group-item list-group-item-action" id="list-profile-list"
                                    data-bs-toggle="list" href="#list-language" role="tab"
                                    aria-controls="list-profile">Personalization</a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-8 post-section p-3">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-setting" role="tabpanel"
                    aria-labelledby="list-home-list">
                    <h4>Email Address</h4>
                    <p class="gray-text fw-light">We will never share your email address or share it publicly</p>

                    {{-- email --}}
                    <div class="p-4 d-flex">
                        <h5 class="m-0 p-1">{{ auth()->user()->email }}</h5>
                        <small class="verified rounded p-1 px-2 ms-2 text-white fw-light">verified
                            <i class="fa-solid fa-user-check"></i>
                        </small>
                    </div>

                    <div class="mt-3">
                        <h4>Connected Accounts</h4>
                        <p class="gray-text fw-light">Connect your other accounts to to TACTICS-Connect</p>
                    </div>

                    {{-- link account buttons --}}
                    <div class="p-3">
                        <button class="w-25 row border-0 rounded p-3 facebook text-white">Connect to Facebook</button>
                        <button class="w-25 row border-0 rounded p-3 my-3 bg-dark text-white">Connect to Github</button>
                        <button class="w-25 row border-0 rounded p-3 linkedIn text-white">Connect to LinkedIn</button>
                    </div>

                    {{-- Delete account section --}}
                    <div class="mt-3">
                        <h4>Delete Account</h4>
                        <p class="gray-text fw-light">Deleting your account will permanently erase all the data that
                            you’ve
                            accumulated. Please be aware that this action will permanently delete your TACTICS Connect
                            account.</p>

                        <form action="{{ route('account.delete') }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger p-2 w-25">Delete Account</button>
                        </form>
                    </div>
                </div>

                {{-- Change password --}}
                <div class="tab-pane fade show" id="list-password" role="tabpanel" aria-labelledby="list-home-list">
                    <h4>Change your Password</h4>
                    <p class="gray-text fw-light">Enter your current TACTICS-connect account password followed by the
                        new one to request change password.</p>
                    <form action="{{ route('account.updatePassword') }}" method="POST">
                        @csrf

                        <div class="form-group w-25">
                            <label for="current_password" class="form-label gray-text fw-light">Current Password</label>
                            <input class="form-control fw-light" id="current_password" type="password"
                                name="current_password" placeholder="Enter your current password here..." required>
                            @error('current_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <label for="new_password" class="gray-text fw-light">New Password</label>
                            <input class="form-control fw-light w-25" id="new_password" type="password"
                                name="new_password" placeholder="Enter new password" required>
                            @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="new_password_confirmation" class="gray-text fw-light">Confirm New
                                Password</label>
                            <input class="form-control w-25 fw-light" id="new_password_confirmation" type="password"
                                name="new_password_confirmation" placeholder="Re-enter new password" required>
                        </div>

                        {{-- new password --}}

                        <button type="submit" class="mt-3 btn bg-success w-25 text-white p-2">Update Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style scoped>
    .setting-container {
        background-color: #f4f4f4;
        height: 100vh;
        margin: 0;
        overflow: hidden;
    }


    .setting-header {
        margin-top: 90px;
        margin-left: 180px;
        margin-right: 300px;
    }

    .list-group a {
        border: none;
    }

    .verified {
        background-color: green;
    }

    .facebook {
        background-color: #385490;
    }

    .linkedIn {
        background-color: #3D7CB9;
    }
</style>
