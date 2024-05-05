@extends('nav')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="w3-content w3-display-container " >
                <img class="mySlides" src="{{asset('assets/images/img1.jpg')}}" style="width:100%">
                <img class="mySlides" src="{{asset('assets/images/img2.jpg')}}" style="width:100%">
                <img class="mySlides" src="{{asset('assets/images/img3.jpg')}}" style="width:100%">


                <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
                <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
            </div>
            <br>
            <div id="random-text">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ligula id tortor ultricies cursus. Cras fermentum, felis at malesuada posuere, leo eros pretium dolor, ut consequat nunc ligula nec nisi. Proin vitae accumsan mauris. Fusce auctor mauris et ante tincidunt, quis vehicula justo rutrum. Ut fermentum ex in felis fermentum aliquet. Mauris vitae convallis purus, sit amet viverra lorem. Nullam porttitor consectetur dolor vel vulputate. Vestibulum tristique neque id lacinia efficitur. Curabitur ullamcorper lacinia ultrices. Vivamus non commodo magna. Donec semper finibus odio, in euismod velit vehicula id. Sed ac ex a mauris interdum viverra eget non sapien. Mauris lacinia est sed est cursus, et feugiat risus fermentum.
            </div>
        </div>
    </div>


    <script>
        var slideIndex = 1;
        showDivs(slideIndex);

        function plusDivs(n) {
            showDivs(slideIndex += n);
        }

        function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("mySlides");
            if (n > x.length) {slideIndex = 1}
            if (n < 1) {slideIndex = x.length}
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            x[slideIndex-1].style.display = "block";
        }
    </script>

@endsection
