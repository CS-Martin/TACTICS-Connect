@extends('layouts.app')
<div class="contact-container">
    <div class="contact-divider">
        <div class="contrast">
            <div
                class="contact-us-text-container d-flex flex-column justify-content-center align-items-center text-white">
                <h1 class="contact-us-title">Get in touch</h1>
                <p class="fs-5">Want to get in touch? We'd love to hear from you. Here's how you can reach us...</p>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center align-items-center h-100 p-5">
        <div class="card shadow-lg text-bg-dark text-center w-25 h-50 me-5 p-3">
            <div class="card-body">
                <div class="rounded-circle mb-3 phone-icon">
                    <i class="fa-solid fa-phone fs-1 p-3 rounded-circle text-dark"></i>
                </div>
                <h5 class="card-title">Contact the Team</h5>
                <p class="card-text">Interested in TACTICS-Connect? Just pick up the phone and chat with a member of our team. We will respond at you immediately.</p>
                <a href="#" class="btn btn-primary p-3 btn-color">(+63)1234567899</a>
            </div>
        </div>

        <div class="card shadow-lg text-bg-dark text-center w-25 h-50 me-5 p-3">
            <div class="card-body ">
                <div class="rounded-circle mb-3 phone-icon">
                    <i class="fa-solid fa-comments fs-1 p-3 rounded-circle text-dark"></i>
                </div>
                <h5 class="card-title">Contact Customer Support</h5>
                <p class="card-text">Sometimes you neeed a little help from your friends or from the TACTICS itself. Don't worry, we are here for you.</p>
                <a href="#" class="btn btn-primary p-3 btn-color">Contact Support</a>
            </div>
        </div>
    </div>
</div>

<style scoped>
    .contact-container {
        height: 100vh;
        margin: 0;
        background: #c0c0c046;
        /* background: rgb(36, 36, 36); */
    }

    .contact-divider {
        height: 50%;
        width: 100%;
        position: absolute;
        background: url('img/contact-us-divider.jpg') no-repeat;
        object-fit: fill;
    }

    .contrast {
        height: 100%;
        width: 100%;
        background: rgba(0, 0, 0, 0.466);
    }

    .card {
        margin-top: 200px;
        background-color: rgb(36, 36, 36);
    }

    .phone-icon i {
        background-color: white;
    }

    .contact-us-text-container {
        height: inherit;
    }

    .contact-us-title {
        font-size: 70px;
    }
</style>
