@extends('layouts.default')
@include('includes.create')
@section('introduction_text')

    <p><img src="img/logo.png" alt="logo" align="right" width="100" height="100">{{ __('introduction_texts.homepage_line_1') }}</p>
    <p>{{ __('introduction_texts.homepage_line_2') }}</p>
    <p>{{ __('introduction_texts.homepage_line_3') }}</p>

    @section('content')

    <h1>
        @section('title')
            {{ __('misc.all_brands') }}
        @show

    </h1>

     <?php
     $size = count($brand);
     $columns = 3;
     $chunk_size = ceil($size / $columns);
     ?>


        <!-- Example row of columns -->
        <div class="row">


                        <ul>
                            @foreach($types as $type)

                                <li>
                                    <a href="{{$type->manuals[0]->originUrl }}">{{ $type->name }}</a>
                                </li>

                                <a href={{"delete/".$type->id}}><i class="fa fa-solid fa-trash-can"></i></a>

                            @endforeach
                     </ul>




                <div>
                <?php
                unset($header_first_letter);
                ?>

        </div>

    </div>

@endsection



@endsection
