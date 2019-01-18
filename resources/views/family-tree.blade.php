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

                    {{--@foreach($grandChilds as $grand)
                        @if($grand[0]->sponsor_code == '1dbu2voe1')
                            {{$grand}}
                        @endif
                    @endforeach--}}

                    <div class="tree" style="overflow: auto auto;display: flex;">
                        <ul>
                            <li>
                                <a href="#"> {{$loggedinUsername}}</a>
                                @if(isset($childData) && count($childData) > 0)
                                    <ul>
                                        @foreach($childData as $child)

                                            <li>
                                                <a href="#">{{$child->name}}</a>
                                                <ul>
                                                    @foreach($grandChilds as $grand)
                                                        @for ($i = 0; $i < count($grand); $i++)
                                                            @if($grand[$i]->sponsor_code == $child->joining_code)
                                                                <li>
                                                                    <a href="#">{{$grand[$i]->name}}</a>
                                                                    {{--<ul>
                                                                            <li>
                                                                                <a href="#">Grand Child 1-1</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">Grand Child 1-2</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">Grand Child 1-3</a>
                                                                            </li>
                                                                        </ul>--}}
                                                                </li>
                                                            @endif
                                                        @endfor
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>No Child Found</p>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
