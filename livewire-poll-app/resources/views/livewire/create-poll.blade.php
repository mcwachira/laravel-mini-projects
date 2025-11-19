<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}


    <form wire:submit.prevent="createPoll">
        <label>
            Poll Title
        </label>
        @error("title")
        <div class="text-red-500">
            {{$message}}
        </div>   @enderror

        <input type="text" wire:model="title"/>



        <div class="mb-4 mt-4 ">
<button class="btn" wire:click.prevent="addOption" >Add Option</button>
        </div>

        <div>


        @foreach($options as  $index => $option)
    <div class="mb-4">

        <label>

            Options {{$index + 1}}
        </label>


            <div class="flex gap-2">
                <input type="text" wire:model="options.{{$index}}">


                <button class="btn" wire:click.prevent="removeOption({{$index}})"> Remove</button>
            </div>


        @error("options.{$index}")
        <div class="text-red-500">
            {{$message}}
        </div>   @enderror
{{--        {{$index}} - {{$option}}--}}

    </div>
        @endforeach

        </div>

        <button type="submit" class="btn">
            Create Poll
        </button>
    </form>
</div>
