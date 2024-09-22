@props(['job'])

<x-panel class="gap-6">
    <div>
        <x-employer-logo :employer="$job->employer" />
    </div>

    <div class="flex-1 flex flex-col">
        <a href=""
            class="self-start text-sm text-gray-400 group-hover:text-blue-800 transition duration-300">{{ $job->employer->name }}</a>

        <h3 class="font-bold text-xl mt-3"><a href="{{ $job->url }}" target="_blank"
                rel="noopener noreferrer">{{ $job->title }}</a></h3>
        <p class="text-sm text-gray-400 mt-auto">{{ $job->schedule }} - From {{ $job->salary }}</p>
    </div>

    <div>
        @foreach ($job->tags as $tag)
            <x-tag :$tag />
        @endforeach
    </div>
</x-panel>
