@extends('templates.kuteshop_v2.layouts.frontend.master')

@section('Title','Account Information')

@section('PageCss')

@endsection

@section('Content')
    <main class="site-main">

        <div class="columns container">
            <!-- Block  Breadcrumb-->

            <ol class="breadcrumb no-hide">
                <li><a href="#">Home    </a></li>
                <li class="active">Dashboard</li>
            </ol><!-- Block  Breadcrumb-->

            <div class="row">
                <div class="col-md-9 col-md-push-3 col-main">
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

                <!-- Sidebar -->
                <div class="col-md-3 col-md-pull-9   col-sidebar">
                    @include('templates.kuteshop_v2.buyer.partials.right_side')
                </div>
                <!-- Sidebar -->
            </div>
        </div>
    </main>
@endsection

@section('PageJs')

@endsection
