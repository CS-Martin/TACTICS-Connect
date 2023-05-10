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
                                <a class="list-group-item list-group-item-action backgroundColor active"
                                    id="list-home-list" data-bs-toggle="list" href="#list-setting" role="tab"
                                    aria-controls="list-home">Settings</a>
                            </div>
                            <div>
                                <a class="list-group-item list-group-item-action backgroundColor" id="list-profile-list"
                                    data-bs-toggle="list" href="#list-password" role="tab"
                                    aria-controls="list-profile">Password</a>
                            </div>

                            <h5 class="mt-3">Preferences</h5>
                            <div>
                                <a class="list-group-item list-group-item-action backgroundColor" id="list-home-list"
                                    data-bs-toggle="list" href="#list-home" role="tab"
                                    aria-controls="list-home">Emails</a>
                            </div>
                            <div>
                                <a class="list-group-item list-group-item-action backgroundColor" id="list-profile-list"
                                    data-bs-toggle="list" href="#list-profile" role="tab"
                                    aria-controls="list-profile">Language</a>
                            </div>
                            <div>
                                <a class="list-group-item list-group-item-action backgroundColor" id="list-profile-list"
                                    data-bs-toggle="list" href="#list-profile" role="tab"
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
                    <h1>Email Address</h1>
                    <p class="gray-text fw-light">We will never share your email address or share it publicly</p>

                    {{-- email --}}
                    <div class="p-4 d-flex">
                        <h5 class="m-0 p-1">{{ auth()->user()->email }}</h5>
                        <small class="verified rounded p-1 ms-2 text-white">verified</small>
                    </div>

                    <h1>Connected Accounts</h1>
                    <p class="gray-text fw-light">Connect your other accounts to to TACTICS-Connect</p>

                    {{-- link account buttons --}}
                    <div class="p-3">

                        <button class="w-25 row border-0 rounded p-3 facebook text-white">Connect to Facebook</button>
                        <button class="w-25 row border-0 rounded p-3 my-3 bg-dark text-white">Connect to Github</button>
                        <button class="w-25 row border-0 rounded p-3 linkedIn text-white">Connect to LinkedIn</button>
                    </div>

                    {{-- Delete account section --}}
                    <div>
                        <h1>Delete Account</h1>
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
