<!-- Page header -->
<section class="content-header">
    <h1>{{$title}}</h1>
</section>
<!-- /page header -->
<script src="http://schnk/ckeditor4-major/ckeditor.js"></script>
<script type="text/javascript" src="http://schnk/js/ckfinder/ckfinder.js"></script>
@include('ckfinder::setup')
<!-- Content area -->
<div class="content">

    <!-- Input group addons -->
    <div class="box card">
        <form role="form" enctype="multipart/form-data" method="post" action="{{ route('materials.update',['material' => $item->id ]) }}">

            @csrf
            @method('PUT')
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @csrf
                <fieldset class="mb-3">
                    <legend class="">{{__('Common info')}}</legend>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('Title')}}<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="title" required class="form-control"
                                       value="{{ $item->title ?? "" }}"
                                       placeholder="{{__('Title')}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('Alias')}}<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="alias" class="form-control"
                                       value="{{ $item->alias ?? "" }}"
                                       placeholder="{{__('Alias')}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('Course')}}</label>
                        <div class="col-lg-10">
                            <select name="courses_id" class="form-control">
                                @foreach($courses as $course)
                                    <option value={{$course->id}} @if($course_old->id == $course->id) selected @endif>{{$course->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('Method')}}<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="number" name="methods_id" class="form-control"
                                       value="{{$method->id}}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('Description')}}<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="description" class="form-control"
                                       value="{{ $item->description ?? "" }}"
                                       placeholder="{{__('Description')}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('Content')}}<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <textarea id="contents" type="text" name="contents" class="form-control"
                                   placeholder="{{__('Content')}}">
                                {{ $item->contents ?? "" }}</textarea>
                        </div>
                    </div>
                    
                </fieldset>
                <button type="submit" class="btn btn-success">{{__('Submit')}}</button>
            </div>
        </form>
    </div>
    <!-- /input group addons -->
    <script>
        document.addEventListener("DOMContentLoaded", function (event) {
            var editor = CKEDITOR.replace('contents');
            CKFinder.setupCKEditor(editor);
        });
    </script>

    <script>CKFinder.config( { connectorPath: '/ckfinder/connector' } );</script>


</div>

<!-- /content area -->
