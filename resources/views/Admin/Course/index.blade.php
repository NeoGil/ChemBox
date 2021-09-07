<!-- Page header -->
<section class="content-header">
    <h1>{{$title}}</h1>
    <a href="{{route('courses.create')}}" class="btn btn-success">{{ __('Create') }}</a>

</section>
<!-- /page header -->

<!-- Content area -->
<div class="content">
    <!-- Hover rows -->
    <div class="card">
        <div class="table-responsive">
            @if($courses)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Alias') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <td>{{$course->id}}</td>
                            <td>{{$course->title}}</td>
                            <td>{{$course->alias}}</td>
                            <td>
                                <a href="{{route('courses.edit',['course'=>$course->id])}}"
                                   class="btn btn-primary btn-labeled">{{ __('Edit') }}
                                </a>


                                <form method="post"  action="{{route('courses.delete',['course'=>$course->id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button  type="submit" class="btn btn-danger">{{ __('Delete') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    <div style="display:none">
                        <form method="post" id="contact-applications-delete" action="">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>

                    </tbody>
                </table>
            @endif
        </div>
    </div>
    <!-- /hover rows -->

</div>
<!-- /content area -->
