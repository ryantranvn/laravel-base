@extends('layouts.admin')

@section('css')
@endsection

@section('js')
@endsection

@section('content')
    <section class="content">
        @include('adminbsb.partials.breadcrumb')
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="card">
                    <div class="header">
                        @include('adminbsb.partials.header')
                    </div>
                    <div class="body">
                        @include('adminbsb.category.top_buttons')
                        <table class="table table-striped table-bordered tableResize">
                            <thead>
                            <tr>
                                <th data-sort="index" class="sorting">#</th>
                                <th data-sort="name" class="sorting">Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($provinces as $key => $province)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $province->name }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                            </tr>
                            </tfoot>
                        </table>
                        <div class="row">
                            {{ $provinces->appends(request()->query())->links('adminbsb.partials.pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection