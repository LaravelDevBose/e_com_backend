@extends('layouts.app')
@section('PageTitle','Create General Pages')

@section('PageCss')

@endsection

@section('ThemeJs')
    <script type="text/javascript" src="{{ asset('assets/js/plugins/editors/summernote/summernote.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/editor_summernote.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/ripple.min.js') }}"></script>
@endsection

@section('content')
    <div class="content">
        <form action="{{ route('admin.cms.pages.store') }}" method="POST">
            @csrf
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h5 class="panel-title">Page Information</h5>
                    <div class="heading-elements">

                    </div>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Page Title:</label>
                                <input type="text" name="page_title" class="form-control" placeholder="Page Title" required>
                            </div>
                            <div class="form-group">
                                <label>Menu Title:</label>
                                <input type="text" name="menu_title" class="form-control" placeholder="Menu Title" required>
                            </div>
                            <div class="form-group">
                                <label>Menu Position:</label>
                                <input type="number" name="menu_position" class="form-control" placeholder="Menu Position" required>
                                <input type="hidden" name="show_in" value="2" class="form-control" placeholder="Menu Position" required>
                            </div>
                            <!-- <div class="form-group">
                                <label>Show In:</label>
                                <vue-select2 :options="pageDependency.show_in"> </vue-select2>
                            </div> -->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Page Create For:</label>
                                <select name="page_cat" id="" class="form-control">
                                    <option value="1">Terms & Conditions</option>
                                    <option value="2">Privacy & Policy</option>
                                    <option value="3">Customer Service</option>
                                    <option value="4">About Us</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="checkbox-style" for="paypal_payment">
                                    <span class="text-bold text-success">Page Status</span>
{{--                                    <span class="text-bold text-warning" >UnPublish</span>--}}
                                    <input type="checkbox" name="page_status" value="1" id="paypal_payment"  >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="body_content">Body Content</label>
                                <textarea name="body_content" class="summernote"></textarea>
                            </div>
                        </div>
                        <div class="col-md-3 col-md-offset-9">
                            <div class="text-right form-group">
                                <button type="submit" class="btn btn-primary btn-block">Save Page <i class="icon-arrow-right14 position-right"></i></button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
@section('PageJs')

@endsection
