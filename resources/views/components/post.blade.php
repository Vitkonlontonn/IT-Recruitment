<div class="col-md-6 col-lg-4">
    <div class="rotating-card-container manual-flip" style="height: 328.875px; margin-bottom: 30px;">
        <div class="card card-rotate">
            <div class="front truncate" style="min-height: 328.875px;">
                <div class="card-content col-3">
                    <h6 class="category-social text-success">
                        <i class="fa fa-newspaper-o"></i> {{ $title }}
                    </h6>
                    <h6 class="card-title">
                        <a href="#pablo">
                            {{ $languages }}
                        </a>
                    </h6>
                    <p class="card-description">
                    </p>
                    <div class="footer" style=" align-items: center; justify-content: space-between">
                        <div>
                            <p class="card-description">
                                <b>{{ $company -> name }}</b>

                            </p>
                            <br>
                        </div>
                        <br>
                        <div class="author" >

                                <span>{{$location}}</span>

                        </div>
                        <div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 1131px; top: 16561px; background-color: rgb(60, 72, 88); transform: scale(12.75);"></div></div>

                        <br>
                        <button type="button" name="button" class="btn btn-sm btn-success btn-fill btn-round btn-rotate">
                            <i class="material-icons">refresh</i>
                        </button>
                    </div>
                </div>
            </div>

{{--            Mặt sau--}}
            <div class="back" style="height: 328.875px; width: 359.99px;">
                <div class="card-content">
                    <br>
                    <h5 class="card-title">
                        Information
                    </h5>
                    <p class="card-description">
                        {{$location}}
                    </p>
                    <div class="footer text-center">
                        <a  class="btn btn-rose btn-round"
                        href="{{route('applicant.show', $postId)}}">
                            <i class="material-icons">subject</i>  Read
                        </a>
                        <a href="#pablo" class="btn btn-just-icon btn-round btn-twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#pablo" class="btn btn-just-icon btn-round btn-dribbble">
                            <i class="fa fa-dribbble"></i>
                        </a>

                        <a href="#pablo" class="btn btn-just-icon btn-round btn-facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <br>
                        {{$part_time}} -
                        {{$remote}}
                    </div>
                    <br>
                    <button type="button" name="button" class="btn btn-simple btn-round btn-rotate">
                        <i class="material-icons">refresh</i> Back...
                        <div class="ripple-container"></div></button>

                </div>
            </div>

        </div>
    </div>
</div>
