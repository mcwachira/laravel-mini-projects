<x-layout>

   <x-bread-crumbs  class="mb-4" :links="['Jobs' => route('jobs.index'), $job ->title => '#']"/>

    <x-job-card :job="$job">
        <p class=" mb-4 text-sm text-slate-500">
            {!! nl2br(e($job ->description)) !!}
        </p>
    </x-job-card>

    <x-card class="mb-4">
<h2 class="mb-4 text-lg font-medium">
    More {{$job-> employer -> company_name}} Jobs
</h2>

        <div class="text-base text-slate-500">
            @foreach($job ->employer->jobs as $otherJob)


                <div class="flex mb-4 justify-between">

                    <div>
                        <div class=" text-slate-700">

                            <a href={{route('jobs.show', $otherJob)}}">
                        {{$otherJob-> title}}</a>
                    </div>

                       <div class="text-sm">
                            {{$otherJob-> created_at ->diffForHumans()}}
                        </div>

                    </div>

                    <div class="text-sm">

                        ${{
    number_format($otherJob->salary)
}}
                    </div>
                </div>

            @endforeach
        </div>

    </x-card>

</x-layout>
