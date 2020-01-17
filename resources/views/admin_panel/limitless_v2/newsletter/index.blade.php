@extends('layouts.app')
@section('PageTitle','News-Letter List')

@section('PageCss')

@endsection

@section('ThemeJs')

    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/ripple.min.js') }}"></script>
@endsection

@section('content')
    <div class="content">
        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Newsletter List</h5>

            </div>

            <table class="table table-sm table-striped table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Email Address</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($newsletters))
                    @foreach($newsletters as $newsletter)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <span>{{ $newsletter->email_address }}</span>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
@endsection
@section('PageJs')

@endsection
