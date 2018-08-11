@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Blog Show</div>
				
                <div class="panel-body">
					
                    <form class="form-horizontal">
						{{ method_field('PATCH') }}	
						{{ csrf_field() }}

                        <div class="form-group{{ $errors->has('topic') ? ' has-error' : '' }}">
                            <label for="topic" class="col-md-4 control-label">topic</label>

                            <div class="col-md-6">
                                <input id="topic" type="text" class="form-control" name="topic" value="{{$post->topic}}" readonly>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('post') ? ' has-error' : '' }}">
                            <label for="post" class="col-md-4 control-label">Post</label>

                            <div class="col-md-6">
                                <textarea id="post" class="form-control" name="post" readonly>{{ $post->post }}</textarea>
                               
                            </div>
                        </div>

                        <div class="form-group">
                            <div class=" col-md-offset-4 col-md-1">
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
