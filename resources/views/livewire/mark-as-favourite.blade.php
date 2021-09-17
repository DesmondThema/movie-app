<div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
    <input wire:click="mark({{ $movie['id'] }})" type="checkbox" name="toggle" id="toggle" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
    <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
</div>
<div
    class="mt-2"
    x-data="{show:false}"
    x-show.transition.opacity.out.duration.1500ms="show"
    x-init="@this.on('saved', () => { show = true; setTimeout(() => {show = false}, 2000) })"
    style="display: none" class="font-sans"
>
    <span class="text-sm text-green-600">Movie marked as favorite</span>
</div>
