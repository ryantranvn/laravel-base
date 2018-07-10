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
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="topTree font-bold">{{ trans('adminbsb.choose_parent_category') }}</p>
                                <div class="easy-tree">
                                    <ul>
                                        <li>Example 1</li>
                                        <li>Example 2</li>
                                        <li>Example 3
                                            <ul>
                                                <li>Example 1</li>
                                                <li>Example 2
                                                    <ul>
                                                        <li>Example 1</li>
                                                        <li>Example 2</li>
                                                        <li>Example 3</li>
                                                        <li>Example 4</li>
                                                    </ul>
                                                </li>
                                                <li>Example 3</li>
                                                <li>Example 4</li>
                                            </ul>
                                        </li>
                                        <li>Example 0
                                            <ul>
                                                <li>Example 1</li>
                                                <li>Example 2</li>
                                                <li>Example 3</li>
                                                <li>Example 4
                                                    <ul>
                                                        <li>Example 1</li>
                                                        <li>Example 2</li>
                                                        <li>Example 3</li>
                                                        <li>Example 4</li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <form id="frmCategory" action="{{ url('/'.MANAGE_SYSTEM.'/'.$controller) }}" method="POST"  class="form-horizontal" role="form" novalidate="novalidate">
                                    {{ csrf_field() }}
                                    {{ method_field('POST') }}

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label class="form-label">{{ trans('adminbsb.category_name') }}</label>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="category_name" class="form-control limit limit255" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label class="form-label">{{ trans('adminbsb.category_slug') }}</label>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="category_slug" class="form-control" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label class="form-label">{{ trans('adminbsb.category_desc') }}</label>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <textarea name="category_desc" class="form-control limit limit1024" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label class="form-label">{{ trans('adminbsb.category_order') }}</label>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <div data-trigger="spinner" class="spinner">
                                                            <input type="text" value="0" data-rule="quantity" data-min="0" class="form-control align-center" />
                                                            <span class="btnSpinner btnSpinnerUp" data-spin="up">
                                                                <i class="material-icons">keyboard_arrow_up</i>
                                                            </span>
                                                            <span class="btnSpinner btnSpinnerDown" data-spin="down">
                                                                <i class="material-icons">keyboard_arrow_down</i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection