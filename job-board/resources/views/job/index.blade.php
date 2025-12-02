<x-layout>

    <x-bread-crumbs  class="mb-4" :links="['Jobs' => route('jobs.index')]"/>

<x-card class="mb-4 text-sm">
    <form action="{{route('jobs.index')}}" method="GET">



    <div class="mb-4 grid grid-cols-2 gap-4">
        <div>
<div class="mb-1 font-semibold">
    Search
</div>
            <x-text-input name="search" value="" placeholder="search for any text" />
        </div>


        <div>
            <div class="mb-1 font-semibold">
                Salary
            </div>

            <div class="flex space-x-3">
                <x-text-input name="min_salary" value="" placeholder="From" />
                <x-text-input name="max_salary" value="" placeholder="to" />
            </div>



        </div>
{{--        <div>--}}
{{--            <div class="mb-1 font-semibold">--}}
{{--    Search--}}
{{--</div>--}}
{{--            <x-text-input name="search" value="" placeholder="search for any text" />--}}
{{--        </div>--}}
{{--        <div><div class="mb-1 font-semibold">--}}
{{--    Search--}}
{{--</div>--}}
{{--            <x-text-input name="search" value="" placeholder="search for any text" />--}}
{{--        </div>--}}
    </div>

        <button class="mt-10 w-full">
            Filter
        </button>
    </form>
</x-card>
    @foreach($jobs as $job)
        <x-job-card class="mb-4" :job="$job">


            <div>

                <x-link-button  :href="route ('jobs.show', $job)" >
                    Show
                </x-link-button>
            </div>
        </x-job-card>
    @endforeach
</x-layout>
