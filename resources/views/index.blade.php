
<div>Hello blade template</div>

<div>
    {{-- @if(count($tasks)) --}}
        <div>There are tasks</div>
        @forelse ($tasks as $task)
            <div>
                <a href="{{ route('task.show', [ 'id'=>$task->id ]) }}">{{ $task->title }}</a>
            </div>
        @empty
            <div>There is no tasks!</div>
        @endforelse


    {{-- @endif --}}
</div>
