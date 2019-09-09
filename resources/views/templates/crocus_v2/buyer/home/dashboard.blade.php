@extends('templates.crocus_v2.layouts.buyer.master')

@section('Title','Dashboard')

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
                            <h2>My Dashboard</h2>
                        </div>
                        <div class="dashboard">
                            <div class="welcome-msg">
                                <strong>Hello, Jon Doe!</strong>
                                <p>From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.</p>
                            </div>
                            <div class="recent-orders">
                                <div class="title-buttons">
                                    <strong>Recent Orders</strong>
                                    <a href="#">View All</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="data-table" id="my-orders-table">
                                        <col />
                                        <col />
                                        <col />
                                        <col width="1" />
                                        <col width="1" />
                                        <col width="1" />
                                        <thead>
                                            <tr class="first last">
                                                <th>Order #</th>
                                                <th>Date</th>
                                                <th>Ship to</th>
                                                <th>
                                                    <span class="nobr">Order Total</span>
                                                </th>
                                                <th>Status</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="first odd">
                                                <td>500000002</td>
                                                <td>9/9/10</td>
                                                <td>Jon D</td>
                                                <td>
                                                    <span class="price">$5.00</span>
                                                </td>
                                                <td>
                                                    <em>Pending</em>
                                                </td>
                                                <td class="a-center last">
                                                    <span class="nobr">
                                                        <a href="#">View Order</a>
                                                        <span class="separator">|</span>
                                                        <a href="#">Reorder</a>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr class="last even">
                                                <td>500000001</td>
                                                <td>9/9/10</td>
                                                <td>Jon D</td>
                                                <td>
                                                    <span class="price">$1,397.99</span>
                                                </td>
                                                <td>
                                                    <em>Pending</em>
                                                </td>
                                                <td class="a-center last">
                                                    <span class="nobr">
                                                        <a href="#">View Order</a>
                                                        <span class="separator">|</span>
                                                        <a href="#">Reorder</a>
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
