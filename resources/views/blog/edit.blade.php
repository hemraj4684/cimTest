@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Blogs</div>
				
                <div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					@if (Session::has('success'))
						<div class="alert alert-success">
							<strong>Successfully!</strong> Updated.
						</div>
					@endif
					
					@if (Session::has('fail'))
						<div class="alert alert-danger">
							<strong>Whoops!</strong> Record Not Updated 
						</div>
					@endif
                    <form class="form-horizontal" method="POST" action="{{ route('blogs.update',$post->id) }}">
						{{ method_field('PATCH') }}	
						{{ csrf_field() }}

                        <div class="form-group{{ $errors->has('topic') ? ' has-error' : '' }}">
                            <label for="topic" class="col-md-4 control-label">topic</label>

                            <div class="col-md-6">
                                <input id="topic" type="text" class="form-control" name="topic" value="{{$post->topic}}" autofocus>

                                @if ($errors->has('topic'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('topic') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('post') ? ' has-error' : '' }}">
                            <label for="post" class="col-md-4 control-label">Post</label>

                            <div class="col-md-6">
                                <textarea id="post" class="form-control" name="post">{{ $post->post }}</textarea>
                                @if ($errors->has('post'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('post') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class=" col-md-offset-4 col-md-1">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
							<div class="col-md-2">
                                <a href="{{route('blogs.index')}}" class="btn btn-primary">
                                    View All
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
