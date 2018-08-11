@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading clearfix">
					All Post
					@if($user_id)
					<a href="{{route('blogs.create')}}" class="btn btn-primary pull-right" title="Create New Post">Create New Blog</a>
					@endif
				</div>
				@if (Session::has('success'))
						<div class="alert alert-success">
							<strong>Successfully!</strong> {{Session::get('success')}}.
						</div>
					@endif
				<div class="panel-body">
					@if(isset($posts))
						<table class="table table-bordered">
							<thead>
							  <tr>
								<th>Author Name</th>
								<th>topic</th>
								<th>post</th>
								<th>Action</th>
							  </tr>
							</thead>
							<tbody>
							 @foreach($posts as $post)
							  <tr>
								<td>
									{{$post->name}}
								</td>
								<td>{{$post->topic}}</td>
								<td>{{$post->post}}</td>
								<td>
								@if($post->author_id  === $user_id || $role_id === 1)
										<a href="{{route('blogs.show',$post->blogId)}}" title="show">Show</a> ||
										<a href="{{route('blogs.edit',$post->blogId)}}" title="Edit">Edit</a>
									@else
										<a href="{{route('blogs.show',$post->blogId)}}" title="show">Show</a>
									@endif
								</td>	
							  </tr>
							@endforeach
					@endif	
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
