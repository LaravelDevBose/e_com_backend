@extends('templates.crocus_v2.layouts.frontend.master')

@section('Title','Account Information')

@section('PageCss')

@endsection

@section('Content')
<div class="main-container col2-right-layout">
    <div class="main container">
        <div class="row">
            <section class="col-sm-9 wow bounceInUp animated">
                <div class="col-main">
                    <div class="my-account">
                        <div class="page-title">
                            <h2>Account Information</h2>
                        </div>
                        <div class="dashboard">
                            <div class="welcome-msg">
                                <strong>Hello, Jon Doe!</strong>
                                <p>From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.</p>
                            </div>
                            <div class="box-account">
                                <div class="page-title">
                                    <h2>Account Information</h2>
                                </div>

                                <div class="col-md-12"></div>
                                <div class="col-md-6">
                                    <h4>Contact Information</h4>
                                    <a href="edit-contact-info">Edit</a>
                                    <p>
                                        Jon Doe
                                        <br />jond@gmail.com
                                        <br />
                                        <a href="change-password">Change Password</a>
                                    </p>
                                    <hr />
                                    <h4>Address Book</h4>
                                    <a href="address-book">Manage Addresses</a>
                                    <p>
                                        Jon D
                                        <br />Hunts Ville
                                        <br />MG, Alabama, 46532
                                        <br />United States
                                        <br />T: 454541
                                        <br />
                                    </p>
                                </div>

                                <div class="col-md-6">
                                    <h4>Primary Billing Address</h4>
                                    <p>
                                        Jon D
                                        <br />Hunts Ville
                                        <br />MG, Alabama, 46532
                                        <br />United States
                                        <br />T: 454541
                                        <br />
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- right side -->
            @include('templates.crocus_v2.buyer.partials.right_side')
        </div>
    </div>
</div>
@endsection

@section('PageJs')

@endsection
