@extends('layout_frontpage.master')
@section('content')
    <div class="media media-post">
        <div class="media-body">
            <form class="form" action="{{route('applicant.appling')}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row">
                    <div class="form-group form-file-upload is-empty is-fileinput">
                        <input type="file" name="file" id="inputFile2" multiple="">
                        <div class="input-group">
                            <input  type="text" readonly="" class="form-control" placeholder="    Your CV">
                            <span class="input-group-btn input-group-s">
										<button type="button" class="btn btn-just-icon btn-round btn-primary">
											<i class="material-icons">attach_file</i>
										</button>
							</span>
                        </div>
                        <span class="material-input"></span></div>
                </div>
                <br>

                <div class="media-footer">

                    <button class="btn btn-primary pull-right" type="submit">Done</button>
                </div>
            </form>

        </div><!-- end media-body -->

    </div>
@endsection
