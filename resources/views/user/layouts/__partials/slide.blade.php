<div class="d-flex justify-content-center mb-2">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php $i =0; ?>
            @foreach ($slides as $slide)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"
                    @if ($i==0)
                        class = "active"
                    @endif
                ></li>      
            @endforeach
            <?php $i++; ?>
        </ol>
        <div class="carousel-inner">
            <?php $i =0; ?>
            @foreach ($slides as $slide)
            <div @if ($i==0)
                class="carousel-item active"
            @else
                class="carousel-item"
            @endif >
            <?php $i++; ?>
                <a href="{{ $slide->link }}">
                    <img class="d-block" src="{{asset('/images/slides/'.$slide->image)}}" alt="{{$slide->name}}" height="350px" width="1260px">
                </a>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>