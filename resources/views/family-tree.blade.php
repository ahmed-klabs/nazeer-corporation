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
                                                                    <ul>
                                                                        @foreach($grandChildArray3 as $grandThree)
                                                                            @for ($j = 0; $j < count($grandThree); $j++)
                                                                                @if($grandThree[$j]->sponsor_code == $grand[$i]->joining_code)
                                                                                    <li>
                                                                                        <a href="#">{{$grandThree[$j]->name}}</a>

                                                                                        <ul>
                                                                                            @foreach($grandChildArray4 as $grandFour)
                                                                                                @for ($k = 0; $k < count($grandFour); $k++)
                                                                                                    @if($grandFour[$k]->sponsor_code == $grandThree[$j]->joining_code)
                                                                                                        <li>
                                                                                                            <a href="#">{{$grandFour[$k]->name}}</a>


                                                                                                            <ul>
                                                                                                                @foreach($grandChildArray5 as $grandFive)
                                                                                                                    @for ($l = 0; $l < count($grandFive); $l++)
                                                                                                                        @if($grandFive[$l]->sponsor_code == $grandFour[$k]->joining_code)
                                                                                                                            <li>
                                                                                                                                <a href="#">{{$grandFive[$l]->name}}</a>


                                                                                                                                <ul>
                                                                                                                                    @foreach($grandChildArray6 as $grandSix)
                                                                                                                                        @for ($m = 0; $m < count($grandSix); $m++)
                                                                                                                                            @if($grandSix[$m]->sponsor_code == $grandFive[$l]->joining_code)
                                                                                                                                                <li>
                                                                                                                                                    <a href="#">{{$grandSix[$m]->name}}</a>




                                                                                                                                                    <ul>
                                                                                                                                                        @foreach($grandChildArray7 as $grandSeven)
                                                                                                                                                            @for ($n = 0; $n < count($grandSeven); $n++)
                                                                                                                                                                @if($grandSeven[$n]->sponsor_code == $grandSix[$m]->joining_code)
                                                                                                                                                                    <li>
                                                                                                                                                                        <a href="#">{{$grandSeven[$n]->name}}</a>


                                                                                                                                                                        <ul>
                                                                                                                                                                            @foreach($grandChildArray8 as $grandEight)
                                                                                                                                                                                @for ($o = 0; $o < count($grandEight); $o++)
                                                                                                                                                                                    <li>
                                                                                                                                                                                        <a href="#">{{$grandEight[$o]->name}}</a>
                                                                                                                                                                                    </li>

                                                                                                                                                                                    @if($grandEight[$o]->sponsor_code == $grandSeven[$n]->joining_code)
                                                                                                                                                                                        <li>
                                                                                                                                                                                            <a href="#">{{$grandEight[$o]->name}}</a>
                                                                                                                                                                                        </li>
                                                                                                                                                                                    @endif
                                                                                                                                                                                @endfor
                                                                                                                                                                            @endforeach
                                                                                                                                                                        </ul>


                                                                                                                                                                    </li>
                                                                                                                                                                @endif
                                                                                                                                                            @endfor
                                                                                                                                                        @endforeach
                                                                                                                                                    </ul>





                                                                                                                                                </li>
                                                                                                                                            @endif
                                                                                                                                        @endfor
                                                                                                                                    @endforeach
                                                                                                                                </ul>

                                                                                                                            </li>
                                                                                                                        @endif
                                                                                                                    @endfor
                                                                                                                @endforeach
                                                                                                            </ul>

                                                                                                        </li>
                                                                                                    @endif
                                                                                                @endfor
                                                                                            @endforeach
                                                                                        </ul>

                                                                                    </li>
                                                                                @endif
                                                                            @endfor
                                                                        @endforeach
                                                                    </ul>
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
