
<h1>Hello blade template</h1>

<div>
    {{-- @if(count($tasks)) --}}
        <h3>These are tasks</h3>
        @forelse ($tasks as $task)
            <div>
                <a href="{{ route('task.show', [ 'id'=>$task->id ]) }}">{{ $task->title }}</a>
            </div>
        @empty
            <div>There is no tasks!</div>
        @endforelse


    {{-- @endif --}}
</div>
