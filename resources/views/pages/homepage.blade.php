@extends('layouts.default')

@section('introduction_text')
    <p><img src="img/logo.png" alt="logo" align="right" width="100" height="100">{{ __('introduction_texts.homepage_line_1') }}</p>
    <p>{{ __('introduction_texts.homepage_line_2') }}</p>
    <p>{{ __('introduction_texts.homepage_line_3') }}</p>
@endsection

<style>
body {
  background-color: white;
  color: black;
  font-size: 25px;
}

.dark-mode {
  background-color: black;
  color: gray;
  color: white;
}
</style>

<button onclick="myFunction()">Toggle dark mode</button>

<form action="/language/en">
    <input type="submit" value="Switch language to English" />
    </form>
    <form action="/language/nl">
    <input type="submit" value="Switch language to Dutch" />
</form>

<script>
function myFunction() {
   var element = document.body;
   element.classList.toggle("dark-mode");
}
</script>
<a href="adminpage">ADMIN</a>

 

@section('content')

    <h1>
        @section('title')
            {{ __('misc.all_brands') }}
        @show

    </h1>
    <h2>Kies een letter:  ⬇</h2>

    <div class="Letters">
        <a href="#A">A</a> <a href="#B">B</a> <a href="#C">C</a> <a href="#D">D</a> <a href="#E">E</a> <a href="#F">F</a> <a href="#G">G</a> <a href="#H">H</a> <a href="#I">I</a> <a href="#J">J</a> <a href="#K">K</a>  <a href="#L">L</a> <a href="#M">M</a> <a href="#N">N</a> <a href="#O">O</a> <a href="#P">P</a> <a href="#Q">Q</a>
        <a href="#R">R</a> <a href="#S">S</a> <a href="#T">T</a> <a href="#U">U</a> <a href="#V">V</a> <a href="#W">W</a> <a href="#X">X</a> <a href="#Y">Y</a> <a href="#Z">Z</a>
     </div>

    <?php
    $size = count($brands);
    $columns = 3;
    $chunk_size = ceil($size / $columns);
    ?>
    <div class="container">
        <h2>Top 10 populairste handleidingen: </h2>

        <ol>

            @foreach($popularTypes as $type)

            <li><a href="/{{ $type->brand->id }}/{{ $type->brand->name_url_encoded }}/{{ $type->id }}/{{ $type->name_url_encoded }}"> {{ $type->name }}</a></li>

            @endforeach

        </ol>
        <!-- Example row of columns -->
        <div class="row">

            @foreach($brands->chunk($chunk_size) as $chunk)
                <div class="col-md-4">

                    <ul>
                        @foreach($chunk as $brand)

                            <?php
                            $current_first_letter = strtoupper(substr($brand->name, 0, 1));

                            if (!isset($header_first_letter) || (isset($header_first_letter) && $current_first_letter != $header_first_letter)) {
                                echo '</ul>
                        
						<h2 id="'.$current_first_letter.'">' . $current_first_letter . '</h2>

						<ul>';
                            }
                            $header_first_letter = $current_first_letter
                            ?>

                            <li>

                                <a href="/{{ $brand->id }}/{{ $brand->name_url_encoded }}/">{{ $brand->name }}</a>
                            </li>
                        @endforeach
                    </ul>

                </div>
                <?php
                unset($header_first_letter);
                ?>
            @endforeach

        </div>

    </div>

@endsection


