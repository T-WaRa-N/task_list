
<h1>Hello blade template</h1>

<div>
    {{-- @if(count($tasks)) --}}
        <h3>These are tasks</h3>
        @forelse ($tasks as $task)

            <a href="{{ route('task.show', [ 'id' => $task->id ]) }}">{{ $task->title }}</a><br>

        @empty
            <div>There is no tasks!</div>
        @endforelse


    {{-- @endif --}}
</div>
