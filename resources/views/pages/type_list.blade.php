@extends('layouts.default')

@section('breadcrumb')
	<li><a href="/{{ $brand->id }}/{{ $brand->name_url_encoded }}/" alt="Manuals for '{{$brand->name}}'" title="Manuals for '{{$brand->name}}'">{{ $brand->name }}</a></li>
@stop

@section('content')

<h1>{{ $brand->name }}</h1>

@if (count($populairTypes) > 0)

<h2>Top 5 handleidingen</h2>

<div class="Top 5">

    <div class="row">
            <div class="col">
                    <ol></ol>
                    <ol>

                            @foreach($populairTypes as $type)

                            <li>



                            	<a href="/{{ $type->brand->id }}/{{ $type->brand->name_url_encoded }}/{{ $type->id }}/{{ $type->name }}" class="type-link">{{ $type->name }}</a>

                            </li>
                      
					        @endforeach
                    </ol>
            </div>
    </div>
</div>
@endif
<p>{{ __('introduction_texts.type_list', ['brand'=>$brand->name]) }}</p>

    <div class="container-type">
        @foreach($types as $type)

            <div class="types1">

                <a href="/{{ $brand->id }}/{{ $brand->name_url_encoded }}/{{ $type->id }}/{{ $type->name_url_encoded }}/">{{ $type->name }}</a>


            </div>
        @endforeach
    </div>



   



@stop