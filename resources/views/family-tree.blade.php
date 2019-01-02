@extends('layouts.theme')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Members Tree
            </h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>
                </div>
                <div class="box-body">
                    {{--<div id="tree" style="padding-bottom: 20px;"></div>--}}
                    <div class="tree" style="overflow: auto auto;display: flex;">
                        <ul>
                            <li>
                                <a href="#">Parent</a>
                                <ul>
                                    <li>
                                        <a href="#">Child 1</a>
                                        <ul>
                                            <li>
                                                <a href="#">Grand Child 1</a>
                                                <ul>
                                                    <li>
                                                        <a href="#">Grand Child 1-1</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Grand Child 1-2</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Grand Child 1-3</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Grand Child 2</a>
                                                <ul>
                                                    <li>
                                                        <a href="#">Grand Child 2-1</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Grand Child 2-2</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Grand Child 2-3</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Grand Child 3</a>
                                                <ul>
                                                    <li>
                                                        <a href="#">Grand Child 3-1</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Grand Child 3-2</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Grand Child 3-3</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Child 2</a>
                                        <ul>
                                            <li>
                                                <a href="#">Grand Child 1</a>
                                                <ul>
                                                    <li>
                                                        <a href="#">Grand Child 1-1</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Grand Child 1-2</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Grand Child 1-3</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Grand Child 2</a>
                                                <ul>
                                                    <li>
                                                        <a href="#">Grand Child 2-1</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Grand Child 2-2</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Grand Child 2-3</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Grand Child 3</a>
                                                <ul>
                                                    <li>
                                                        <a href="#">Grand Child 3-1</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Grand Child 3-2</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Grand Child 3-3</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Child 3</a>
                                        <ul>
                                            <li>
                                                <a href="#">Grand Child 1</a>
                                                <ul>
                                                    <li>
                                                        <a href="#">Grand Child 1-1</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Grand Child 1-2</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Grand Child 1-3</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Grand Child 2</a>
                                                <ul>
                                                    <li>
                                                        <a href="#">Grand Child 2-1</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Grand Child 2-2</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Grand Child 2-3</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Grand Child 3</a>
                                                <ul>
                                                    <li>
                                                        <a href="#">Grand Child 3-1</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Grand Child 3-2</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Grand Child 3-3</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
