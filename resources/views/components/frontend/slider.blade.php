<div id="myCarousel" class="carousel slide" data-ride="carousel">

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
        <img src="{{ asset('images/slider1.jpg')}}" alt="{{ config('app.name')}}">
            <div class="carousel-caption">
                <div class="my-4">
                    <span class="title">Asesoría Jurídica y Formación</span>
                </div>
                <div class="my-4">
                    <span class="subtitle">Profesionalizamos tu Oposición</span>
                </div>
                <div class="my-4 col-4 offset-4">
                    <a class="btn btn-primary btn-small btn-block" href="{{route('courses.index')}}">
                        {{__("Nuestra Formación")}} <i class="ion ion-ios-arrow-thin-right"></i>
                    </a>
                </div>

            </div>
        </div>

    </div>
    <!-- Left and right controls -->

</div>